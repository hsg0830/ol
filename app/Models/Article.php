<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  use HasFactory;

  protected $appends = ['url', 'date'];

  public function getUrlAttribute()
  {
    return route('articles.show', $this->id);
  }

  public function getDateAttribute()
  {
    return $this->created_at->format('Y-m-d');
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