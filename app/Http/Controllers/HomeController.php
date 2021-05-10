<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Question;
use App\Models\Ask;

class HomeController extends Controller
{
  public function index()
  {
    $articles = Article::with('category')
      ->where('status', 1)
      ->select('id', 'title', 'category_id', 'released_at')
      ->orderBy('viewed_count', 'desc')
      ->take(4)->get();

    $questions = Question::with('category')
      ->where('status', 1)
      ->select('title', 'category_id')
      ->orderBy('viewed_count', 'desc')
      ->take(4)->get();

    $asks = Ask::where('status', 1)
      ->select('id', 'title')
      ->orderBy('viewed_count', 'desc')
      ->take(4)->get();

    return view('home', [
      'articles' => $articles,
      'questions' => $questions,
      'asks' => $asks,
    ]);
  }
}