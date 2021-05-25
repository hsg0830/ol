<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;

  protected $appends = ['reply_url', 'created_date'];

  public function editor()
  {
    return $this->belongsTo(Editor::class);
  }

  public function getReplyUrlAttribute()
  {
    return route('contacts.reply', $this->id);
  }

  public function getCreatedDateAttribute() {
    return $this->created_at->format('Y-m-d H:i:s');
  }
}