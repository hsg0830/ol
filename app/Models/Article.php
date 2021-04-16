<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
  use HasFactory;

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