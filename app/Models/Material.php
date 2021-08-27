<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  use HasFactory;

  protected $appends = ['url', 'download_url', 'file_size'];

  public function getUrlAttribute()
  {
    return route('materials.show', $this->id);
  }

  public function getDownloadUrlAttribute()
  {
    return route('materials.download', $this->id);
  }

  public function getFileSizeAttribute()
  {
    if ($this->size <= 99) {
      $size = $this->size . 'B';
    } elseif ($this->size > 99 && $this->size < 1000000) {
      $size = round($this->size / 1000, 1) . 'KB';
    } else {
      $size = round($this->size / 1000000, 1) . ' MB';
    }

    return $size;
  }
}