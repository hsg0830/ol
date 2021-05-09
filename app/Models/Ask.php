<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
  use HasFactory;

  protected $casts = [
    'replied_at' => 'date'
  ];

  protected $appends = ['date', 'url', 'edit_url', 'headline'];

  public function category()
  {
    return $this->belongsTo(QuestionCategory::class);
  }

  public function subCategory()
  {
    return $this->belongsTo(SubCategory::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function getDateAttribute()
  {
    return !is_null($this->replied_at) ? $this->replied_at->format('Y/m/d') : '';
  }

  public function getUrlAttribute()
  {
    return route('bbs.show', $this->id);
  }

  public function getEditUrlAttribute()
  {
    return route('bbs.edit', $this->id);
  }

  public function getHeadlineAttribute()
  {
    return mb_strimwidth($this->draft, 0, 50, '…');
  }
}