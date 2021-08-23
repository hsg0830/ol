<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'birth_year',
    'birth_month',
    'birth_day',
    'birth_date',
    'sex',
    'school_id',
    'role',
    'last_login',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  // protected $appends = ['registered_date'];

  // public function getRegisteredDateAttribute()
  // {
  //   return $this->created_at->format('Y-m-d');
  // }

  public function school()
  {
    return $this->belongsTo(School::class);
  }

  public function asks()
  {
    return $this->hasMany(Ask::class);
  }

  public function favorite_articles()
  {
    return $this->belongsToMany(Article::class)->withTimestamps();
  }

  public function favorite_asks()
  {
    return $this->belongsToMany(Ask::class)->withTimestamps();
  }

  public function article_follow($articleId)
  {
    $exists = $this->is_article_following($articleId);

    if ($exists) {
      return false;
    } else {
      $this->favorite_articles()->attach($articleId);
      return true;
    }
  }

  public function article_unfollow($articleId)
  {
    $exists = $this->is_article_following($articleId);

    if ($exists) {
      $this->favorite_articles()->detach($articleId);
      return true;
    } else {
      return false;
    }
  }

  public function is_article_following($articleId)
  {
    return $this->favorite_articles()->where('article_id', $articleId)->exists();
  }

  public function ask_follow($askId)
  {
    $exists = $this->is_ask_following($askId);

    if ($exists) {
      return false;
    } else {
      $this->favorite_asks()->attach($askId);
      return true;
    }
  }

  public function ask_unfollow($askId)
  {
    $exists = $this->is_ask_following($askId);

    if ($exists) {
      $this->favorite_asks()->detach($askId);
      return true;
    } else {
      return false;
    }
  }

  public function is_ask_following($askId)
  {
    return $this->favorite_asks()->where('ask_id', $askId)->exists();
  }

  public function cleared_tasks()
  {
    return $this->belongsToMany(Task::class)->withTimestamps();
  }

  public function toCleared($taskId) {
    $exists = $this->is_cleared_task($taskId);

    if ($exists) {
      return false;
    } else {
      $this->cleared_tasks()->attach($taskId);
      return true;
    }
  }

  public function toUnCleared($taskId) {
    $exists = $this->is_cleared_task($taskId);

    if ($exists) {
      $this->cleared_tasks()->detach($taskId);
      return true;
    } else {
      return false;
    }
  }

  public function is_cleared_task($taskId) {
    return $this->cleared_tasks()->where('task_id', $taskId)->exists();
  }
}