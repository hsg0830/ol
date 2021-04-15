<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
  protected $appends = ['url'];

  use HasFactory;

  // Accessor こっちは現不使用
  public function getPathAttribute()
  {
    return storage_path('app/public/media/' . $this->filename);
  }

  public function getUrlAttribute()
  {
    return url('storage/media/' . $this->filename);
  }
}