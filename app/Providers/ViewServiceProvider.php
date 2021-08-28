<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Article;
use App\Models\Ask;
use App\Models\Task;

class ViewServiceProvider extends ServiceProvider
{
  public function boot()
  {
    View::composer('*', function ($view) {
      $topArticles = Article::where('status', 1)->orderBy('viewed_count', 'desc')->take(3)->get();

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

      $view->with([
        'topArticles'=> $topArticles,
        'task'=> $task,
        'pickUp'=> $pickUp,
      ]);
    });
  }
}