<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;

  public function article() {
    return $this->belongsTo(Article::class);
  }

  public function ask() {
    return $this->belongsTo(Ask::class);
  }

  public function cleared_users()
  {
    return $this->belongsToMany(User::class)->withTimestamps();
  }
}