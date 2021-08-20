<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use App\Models\User;
use App\Models\Article;
use App\Models\Ask;

class FavoritesController extends Controller
{
  public function article_store(Article $article) {
    $user = Auth::user();
    $result = $user->article_follow($article->id);

    $isFollowing = $user->is_article_following($article->id);

    return [
      'result' => $result,
      'isFollowing' => $isFollowing,
    ];
  }

  public function article_destroy(Article $article) {
    $user = Auth::user();
    $result = $user->article_unfollow($article->id);

    $isFollowing = $user->is_article_following($article->id);

    return [
      'result' => $result,
      'isFollowing' => $isFollowing,
    ];
  }

  public function ask_store(Ask $ask) {
    $user = Auth::user();
    $result = $user->ask_follow($ask->id);

    $isFollowing = $user->is_ask_following($ask->id);

    return [
      'result' => $result,
      'isFollowing' => $isFollowing,
    ];
  }

  public function ask_destroy(Ask $ask) {
    $user = Auth::user();
    $result = $user->ask_unfollow($ask->id);

    $isFollowing = $user->is_ask_following($ask->id);

    return [
      'result' => $result,
      'isFollowing' => $isFollowing,
    ];
  }
}