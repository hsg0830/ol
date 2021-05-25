<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
  use HasFactory;

  protected $appends = ['date', 'edit_url'];

  public function getDateAttribute()
  {
    return $this->created_at->format('Y-m-d H:i:s');
  }

  public function getEditUrlAttribute()
  {
    return route('notices.edit', $this->id);
  }
}