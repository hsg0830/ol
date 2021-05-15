<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Question;
use App\Models\Ask;
use App\Models\Notice;

class HomeController extends Controller
{
  public function index()
  {
    $recentArticles = Article::with('category')
      ->where('status', 1)
      ->select('id', 'title', 'category_id', 'released_at')
      ->orderBy('released_at', 'desc')
      ->take(4)->get();

    $popularArticles = Article::with('category')
      ->where('status', 1)
      ->select('id', 'title', 'category_id', 'released_at', 'viewed_count')
      ->orderBy('viewed_count', 'desc')
      ->take(4)->get();

    $questions = Question::with('category')
      ->where('status', 1)
      ->select('id', 'title', 'answer', 'category_id', 'viewed_count')
      ->orderBy('viewed_count', 'desc')
      ->take(4)->get();

    $asks = Ask::where('status', 1)
      ->select('id', 'title', 'viewed_count')
      ->orderBy('viewed_count', 'desc')
      ->take(4)->get();

    $topNotice = Notice::where('role', 1)
      ->where('status', 1)
      ->select('title', 'description', 'created_at')
      ->orderBy('created_at', 'desc')
      ->first();

    $notices = Notice::where('role', 0)
      ->where('status', 1)
      ->select('title', 'created_at')
      ->orderBy('created_at', 'desc')
      ->take(3)->get();

    return view('home', [
      'recentArticles' => $recentArticles,
      'popularArticles' => $popularArticles,
      'questions' => $questions,
      'asks' => $asks,
      'topNotice' => $topNotice,
      'notices' => $notices,
    ]);
  }
}