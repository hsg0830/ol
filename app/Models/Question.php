<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\QuestionSaving;

class Question extends Model
{
  use HasFactory;

  protected $appends = ['date', 'url', 'edit_url'];

  protected $casts = [
    'released_at' => 'date'
  ];

  // protected $dispatchesEvents = [
  //   'saving' => QuestionSaving::class
  // ];

  public function category()
  {
    return $this->belongsTo(QuestionCategory::class);
  }

  public function subCategory()
  {
    return $this->belongsTo(SubCategory::class);
  }

  public function getDateAttribute()
  {
    return !is_null($this->released_at) ? $this->released_at->format('Y/m/d') : '';
  }

  public function getUrlAttribute()
  {
    return route('qa.show', $this->id);
  }

  public function getEditUrlAttribute()
  {
    return route('qa.edit', $this->id);
  }
}