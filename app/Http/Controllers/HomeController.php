<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Question;
use App\Models\Ask;
use App\Models\Notice;
use App\Models\Task;

class HomeController extends Controller
{
  public function index()
  {
    $recentArticles = Article::with('category')
      ->where('status', 1)
      ->select('id', 'title', 'category_id', 'released_at', 'viewed_count')
      ->orderBy('released_at', 'desc')
      ->take(4)
      ->get();

    $popularArticles = Article::with('category')
      ->where('status', 1)
      ->select('id', 'title', 'category_id', 'released_at', 'viewed_count')
      ->orderBy('viewed_count', 'desc')
      ->take(4)
      ->get();

    $recentAsks = Ask::where('status', 1)
      ->select('id', 'title', 'category_id', 'replied_at', 'viewed_count')
      ->orderBy('replied_at', 'desc')
      ->take(5)
      ->get();

    $popularAsks = Ask::where('status', 1)
      ->select('id', 'title', 'category_id', 'replied_at', 'viewed_count')
      ->orderBy('viewed_count', 'desc')
      ->take(5)
      ->get();

    // $topNotice = Notice::where('role', 1)
    //   ->where('status', 1)
    //   ->select('title', 'description', 'created_at')
    //   ->orderBy('created_at', 'desc')
    //   ->first();

    $notices = Notice::where('role', 0)
      ->where('status', 1)
      ->orderBy('created_at', 'desc')
      ->take(8)->get();

    $noticeCtegories = config('notices.category');

    $today = new \DateTime();
    $today = $today->format('Y-m-d');

    $task = Task::orderBy('end', 'asc')
      ->where('end', '>', $today)
      ->first();

    $pickUp = null;

    if ($task) {
      if ($task->category_id === 1) {
        $pickUp = Article::find($task->article_id);
      } else {
        $pickUp = Ask::find($task->ask_id);
      }
    }


    return view('home', [
      'recentArticles' => $recentArticles,
      'popularArticles' => $popularArticles,
      'recentAsks' => $recentAsks,
      'popularAsks' => $popularAsks,
      // 'topNotice' => $topNotice,
      'notices' => $notices,
      'noticeCtegories' => $noticeCtegories,
      'task' => $task,
      'pickUp' => $pickUp,
      'range' => 1,
      'category' => 1,
      'word' => '',
    ]);
  }
}