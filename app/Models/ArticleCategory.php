<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class ArticleCategory extends Category
{
  use HasFactory;

  protected $table = 'categories';

  protected static function booted()
  {
    static::addGlobalScope('article_category_ids', function (Builder $builder) {
      $category_ids = [100, 200, 300, 400];
      $builder->whereIn('id', $category_ids);
    });
  }

  public function articles()
  {
    return $this->hasMany(Article::class);
  }
}