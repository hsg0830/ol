<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
  use HasFactory;

  protected static function booted()
  {
    static::addGlobalScope('category_ids', function (Builder $builder) {
      $category_ids = [1, 2, 3, 4];
      $builder->whereIn('id', $category_ids);
    });
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
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