<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AskRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AskAlertMail;
use App\Mail\AsksRecievedAlertMail;
use App\Mail\AskReplyNotificationMail;
use App\Models\Ask;
use App\Models\QuestionCategory;
use App\Models\Notice;
use App\Models\Task;
use App\Models\Editor;
use Carbon\Carbon;

class AsksController extends Controller
{
  public function index()
  {
    $categories = $this->getCategories();

    return view('bbs.index', [
      'categories' => $categories,
    ]);
  }

  public function paginate(Request $request)
  {
    $category_id = intval($request->categoryNo);

    $query = Ask::query();

    if ($category_id > 0) {
      $query->where('category_id', $category_id);
    }

    if ($request->searchWord) {
      $keyword = '%' . $request->searchWord . '%';
      $query->where('title', 'like', $keyword);
    }

    $query->where('status', 1)
      ->with('category');

    if ($request->sort == 0) {
      $query->orderBy('replied_at', 'desc');
    } else {
      $query->orderBy('viewed_count', 'desc');
    }

    $asks = $query->paginate(9);

    $notCompatible = Ask::where('status', 0)->count();

    return [
      'asks' => $asks,
      'notCompatible' => $notCompatible,
    ];
  }

  public function store(Request $request)
  {
    if (!Auth::check()) {
      return redirect()->route('bbs.index');
    }

    $request->validate([
      'draft' => 'required',
    ], [
      'draft.required' => '질문내용을 입력하셔야 합니다.',
    ]);

    $ask = new Ask();
    $ask->draft = $request->draft;
    $ask->user_id = Auth::id();
    $result = $ask->save();

    $admin = config('app.admins');
    $userMail = $ask->user->email;
    $name = $ask->user->name;
    $date = $ask->created_at->format('Y-m-d H:i:s');
    $draft = $ask->draft;
    $url = $ask->edit_url;

    Mail::to($userMail)->send(new AsksRecievedAlertMail($name, $date, $draft));
    Mail::to($admin)->send(new AskAlertMail($name, $draft, $url));

    return [
      'result' => $result,
    ];
  }

  public function show(Ask $ask)
  {
    if ($ask->status != 1 && !Auth::guard('editors')->check()) {
      return redirect()->route('bbs.index');
    }

    if (!Auth::guard('editors')->check()) {
      $ask->viewed_count += 1;
      $ask->save();
    }

    $relatedAsks = Ask::where('category_id', $ask->category_id)
      ->where('id', '<>', $ask->id)
      ->where('status', 1)
      ->orderBy('replied_at', 'desc')
      ->take(3)->get();

    $isFollowing = false;
    $isAuthorized = false;

    if (Auth::guard('web')->check()) {
      $isAuthorized = true;
      $isFollowing = Auth::user()->is_ask_following($ask->id);
    }

    $task = Task::where('ask_id', $ask->id)
      ->orderBy('end', 'desc')
      ->first();

    $isCleared = false;

    if (!is_null($task) && Auth::guard('web')->check()) {
      $isCleared = Auth::user()->is_cleared_task($task->id);
    }

    return view('bbs.show', [
      'ask' => $ask,
      'relatedAsks' => $relatedAsks,
      'isFollowing' => $isFollowing,
      'task' => $task,
      'isCleared' => $isCleared,
      'isAuthorized' => $isAuthorized,
    ]);
  }

  public function edit(Ask $ask)
  {
    $categories = $this->getCategories();
    $editors = Editor::select('id', 'name')->get();

    return view('bbs.edit', [
      'ask' => $ask,
      'categories' => $categories,
      'editors' => $editors,
    ]);
  }

  public function changeStatus(Request $request, Ask $ask)
  {
    $result = false;

    $ask->status = $request->status;
    $ask->editor_id = Auth::id();
    $result = $ask->save();

    return [
      'result' => $result,
    ];
  }

  public function update(AskRequest $request, Ask $ask)
  {
    $result = false;

    $ask->status = $request->status;
    $ask->editor_id = $request->editor_id;

    $ask->category_id = $request->category_id;
    $ask->sub_category_id = $request->sub_category_id;
    $ask->title = $request->title;
    $ask->description = $request->description;
    $ask->reply = $request->reply;

    if ($request->status == 1 && is_null($ask->replied_at)) {
      $ask->replied_at = now();
    }

    $result = $ask->save();

    if ($request->notice == 1) {
      $notice = new Notice();
      $notice->editor_id = $ask->editor_id;
      $notice->status = 1;
      $notice->category = 2;
      $notice->title = $ask->title;
      $notice->url = '/bbs/' . $ask->id;
      $notice->save();
    }

    if ($request->status == 1 && $request->send_mail == true) {
      $email = $ask->user->email;
      $name = $ask->user->name;

      Mail::to($email)->send(new AskReplyNotificationMail($name, $ask->url));
    }

    return [
      'result' => $result,
    ];
  }

  public function showAsksList()
  {
    $categories = QuestionCategory::select('id', 'name')->get();
    $editors = Editor::select('id', 'name')->get();
    $total = Ask::count();

    return view('bbs.list', [
      'categories' => $categories,
      'editors' => $editors,
      'total' => $total,
    ]);
  }

  public function getAsksList(Request $request)
  {
    $category_id = intval($request->category_id);
    $status = intval($request->status);
    $viewed_count = intval($request->viewed_count);
    $editor_id = intval($request->editor_id);
    $start_date = 0;
    if($request->start_date > 0) {
      $start_date = new Carbon($request->start_date);
    }
    $end_date = new Carbon($request->end_date);

    $query = Ask::query();
    $query->whereDate('created_at', '<=', $end_date);

    if ($start_date) {
      $query->whereDate('created_at', '>=', $start_date);
    }

    if ($category_id > 0) {
      $query->where('category_id', $category_id);
    }

    if ($status < 4) {
      $query->where('status', $status);
    }

    if ($editor_id > 0) {
      $query->where('editor_id', $editor_id);
    }

    if ($viewed_count == 1) {
      $query->orderBy('viewed_count', 'desc');
    } elseif ($viewed_count == 2) {
      $query->orderBy('viewed_count', 'asc');
    } else {
      $query->orderBy('created_at', 'desc');
    }

    $asks = $query->with('category', 'user')->paginate(30);

    return ['asks' => $asks];
  }

  public function destroy(Ask $ask)
  {
    return [
      'result' => $ask->delete(),
    ];
  }

  // プライベートファンクション
  private function getCategories()
  {
    return QuestionCategory::with('sub_categories')->select('id', 'name')->get();
  }
}
