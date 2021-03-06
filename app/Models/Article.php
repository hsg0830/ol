<?php

namespace App\Models;

use App\Events\ArticleSaving;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  use HasFactory;

  protected $appends = [
    'url',
    'edit_url',
    'date',
    'head_line',
    'short_title',
    'followers'
  ];

  protected $casts = [
    'released_at' => 'date'
  ];

  // protected $dispatchesEvents = [
  //   'saving' => ArticleSaving::class
  // ];

  public function category()
  {
    return $this->belongsTo(ArticleCategory::class);
  }

  public function subCategory()
  {
    return $this->belongsTo(SubCategory::class);
  }

  public function subContents()
  {
    return $this->hasMany(SubContent::class);
  }

  public function is_favorite()
  {
    return $this->belongsToMany(User::class);
  }

  public function getUrlAttribute()
  {
    return route('articles.show', $this->id);
  }

  public function getEditUrlAttribute()
  {
    return route('articles.edit', $this->id);
  }

  public function getDateAttribute()
  {
    return !is_null($this->released_at) ? $this->released_at->format('Y/m/d') : '';
  }

  public function getHeadlineAttribute()
  {
    return mb_strimwidth($this->introduction, 0, 50, '…');
  }

  public function getShortTitleAttribute()
  {
    return mb_strimwidth($this->title, 0, 25, '…');
  }

  public function getFollowersAttribute()
  {
    $followers =  $this->is_favorite()->get();
    return count($followers);
  }
}