<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  use HasFactory;

  protected $appends = ['url', 'edit_url', 'date', 'head_line'];

  public function getUrlAttribute()
  {
    return route('articles.show', $this->id);
  }

  public function getEditUrlAttribute() {
    return route('articles.edit', $this->id);
  }

  public function getDateAttribute()
  {
    return $this->created_at->format('Y-m-d');
    // return $this->status == 1 ? $this->released_at->format('Y-m-d') : '';
    // return $this->released_at != null ? $this->released_at->format('Y-m-d') : '';
  }

  public function getHeadlineAttribute()
  {
    return mb_strimwidth($this->introduction, 0, 50, '…');
  }

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
}