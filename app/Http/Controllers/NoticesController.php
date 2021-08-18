<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notice;

class NoticesController extends Controller
{
  public function showList()
  {
    return view('notices.list');
  }

  public function getNoticesList()
  {
    $notices = Notice::orderBy('id', 'desc')->paginate(15);

    return [
      'notices' => $notices,
    ];
  }

  public function create()
  {
    $categories = config('notices.category');

    return view('notices.post', [
      'categories' => $categories,
    ]);
  }

  public function edit(Notice $notice)
  {
    return view('notices.post', [
      'notice' => $notice,
    ]);
  }

  public function store(Request $request)
  {
    $notice = new Notice();

    return $this->saveNotice($request, $notice);
  }

  public function update(Request $request, Notice $notice)
  {
    return $this->saveNotice($request, $notice);
  }

  public function changeStatus(Notice $notice) {
    $notice->status = !($notice->status);
    $result = $notice->save();

    return [
      'result' => $result,
    ];
  }

  public function destroy(Notice $notice)
  {
    return [
      'result' => $notice->delete(),
    ];
  }

  private function saveNotice(Request $request, Notice $notice)
  {
    $request->validate([
      'role' => ['required', 'between:0,1'],
      'title' => 'required',
      'description' => ($request->role == 1) ? 'required' : '',
      'category' => 'required',
    ]);

    $result = false;

    if (!$notice->exists) {
      $notice->editor_id = Auth::id();
    }

    $notice->role = $request->role;
    $notice->status = $request->status;
    $notice->category = $request->category;
    $notice->title = $request->title;
    $notice->url = $request->url;

    if ($notice->role == 1) {
      $notice->description = $request->description;
    }

    $result = $notice->save();

    return [
      'result' => $result,
      'notice' => $notice,
    ];
  }
}