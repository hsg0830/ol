<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Article;

class ViewServiceProvider extends ServiceProvider
{
  public function boot()
  {
    View::composer('*', function ($view) {
      $topArticles = Article::latest()->take(5)->get();
      $view->with('topArticles', $topArticles);
    });
  }
}