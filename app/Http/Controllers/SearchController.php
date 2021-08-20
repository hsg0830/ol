<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Ask;

class SearchController extends Controller
{
  public function index(Request $request)
  {
    // $range = intval($request->range);
    $category = intval($request->category);
    $word = '%' . $request->word . '%';

    $articles = [];
    $asks = [];

    if ($category === 1) {
      $articles = Article::where('title', 'like', $word)->get();
      $asks = Ask::where('title', 'like', $word)->get();
    } elseif ($category === 2) {
      $articles = Article::where('title', 'like', $word)->get();
    } else {
      $asks = Ask::where('title', 'like', $word)->get();
    }

    return view('search.index', [
      'articles' => $articles,
      'asks' => $asks,
    ]);
  }
}