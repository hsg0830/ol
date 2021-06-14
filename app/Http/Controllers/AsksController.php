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
    $category_id = intval($request->selectedCategory);

    $query = Ask::query();

    if ($category_id > 0) {
      $query->where('category_id', $category_id);
    }

    if ($request->searchWord) {
      $keyword = '%' . $request->searchWord . '%';
      $query->where('title', 'like', $keyword);
    }

    $asks = $query->where('status', 1)->with('category')->orderBy('replied_at', 'desc')->paginate(10);

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
      ->orderBy('replied_at')
      ->take(3)->get();

    return view('bbs.show', [
      'ask' => $ask,
      'relatedAsks' => $relatedAsks,
    ]);
  }

  public function edit(Ask $ask)
  {
    $categories = $this->getCategories();

    return view('bbs.edit', [
      'ask' => $ask,
      'categories' => $categories,
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
    $ask->editor_id = Auth::id();

    $ask->category_id = $request->category_id;
    $ask->sub_category_id = $request->sub_category_id;
    $ask->title = $request->title;
    $ask->description = $request->description;
    $ask->reply = $request->reply;
    if ($request->status == 1 && is_null($ask->replied_at)) {
      $ask->replied_at = now();
    }
    $result = $ask->save();

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
    $total = Ask::count();

    return view('bbs.list', [
      'categories' => $categories,
      'total' => $total,
    ]);
  }

  public function getAsksList(Request $request)
  {
    $category_id = intval($request->category_id);
    $status = intval($request->status);
    $viewed_count = intval($request->viewed_count);

    $query = Ask::query();

    if ($category_id > 0) {
      $query->where('category_id', $category_id);
    }

    if ($status < 4) {
      $query->where('status', $status);
    }

    if ($viewed_count == 1) {
      $query->orderBy('viewed_count', 'desc');
    } elseif ($viewed_count == 2) {
      $query->orderBy('viewed_count', 'asc');
    } else {
      $query->orderBy('created_at', 'desc');
    }

    $asks = $query->with('category', 'user')->paginate(15);

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