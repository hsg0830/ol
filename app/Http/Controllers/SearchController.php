<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Ask;
use App\Models\SubContent;

class SearchController extends Controller
{
  public function index(Request $request)
  {
    $range = intval($request->range) ?? 0;
    $category = intval($request->category) ?? 0;
    $word = '%' . $request->word . '%' ?? '';
    $articles = [];
    $asks = [];

    if ($category === 1) {
      if ($range === 1) {
        $articles = $this->searchArticlesInTitle($word);
        $asks = $this->searchAsksInTitle($word);
      } else {
        $articles = $this->searchArticlesAll($word);
        $asks = $this->searchAsksAll($word);
      }
    } elseif ($category === 2) {
      if ($range === 1) {
        $articles = $this->searchArticlesInTitle($word);
      } else {
        $articles = $this->searchArticlesAll($word);
      }
    } else {
      if ($range === 1) {
        $asks = $this->searchAsksInTitle($word);
      } else {
        $asks = $this->searchAsksAll($word);
      }
    }

    return view('search.index', [
      'articles' => $articles,
      'asks' => $asks,
      'range' => $range,
      'category' => $category,
      'word' => $request->word,
    ]);
  }

  private function searchArticlesInTitle($word)
  {
    $articles = Article::where('status', 1)
      ->where('title', 'like', $word)
      ->orderBy('released_at', 'desc')
      ->get();

    return $articles;
  }

  private function searchAsksInTitle($word)
  {
    $asks = Ask::where('status', 1)
      ->where('title', 'like', $word)
      ->orderBy('replied_at', 'desc')
      ->get();

    return $asks;
  }

  private function searchArticlesAll($word)
  {
    $articles = Article::where('status', 1)
      ->where('title', 'like', $word)
      ->orWhere('introduction', 'like', $word)
      ->orWhereHas('subContents', function ($query) use ($word) {
        $query->where('title', 'like', $word)
          ->orWhere('description', 'like', $word);
      })->get();

    return $articles;
  }

  private function searchAsksAll($word)
  {
    $asks = Ask::where('status', 1)
      ->where('title', 'like', $word)
      ->orWhere('description', 'like', $word)
      ->orWhere('reply', 'like', $word)
      ->orderBy('replied_at', 'desc')
      ->get();

    return $asks;
  }
}