<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class QuestionCategory extends Category
{
  use HasFactory;

  protected $table = 'categories';

  protected static function booted()
  {
    static::addGlobalScope('question_category_ids', function (Builder $builder) {
      $question_ids = [100, 200, 300, 500];
      $builder->whereIn('id', $question_ids);
    });
  }

  public function questions()
  {
    return $this->hasMany(Question::class);
  }
}