<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  use HasFactory;

  protected $appends = ['url', 'download_url'];

  public function getUrlAttribute()
  {
    return route('materials.show', $this->id);
  }

  public function getDownloadUrlAttribute()
  {
    return route('materials.download', $this->id);
  }
}