<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
  use HasFactory;

  protected $casts = [
    'created_at' => 'datetime:Y/m/d',
    'replied_at' => 'date'
  ];

  protected $appends = [
    'replied_date',
    'url',
    'edit_url',
    'headline',
    'followers',
  ];

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

  public function is_favorite()
  {
    return $this->belongsToMany(User::class);
  }

  public function getRepliedDateAttribute()
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

  public function getFollowersAttribute()
  {
    $followers =  $this->is_favorite()->get();
    return count($followers);
  }
}