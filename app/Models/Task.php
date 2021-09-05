<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;

  protected $appends = [
    'cleared_users',
  ];

  public function article() {
    return $this->belongsTo(Article::class);
  }

  public function ask() {
    return $this->belongsTo(Ask::class);
  }

  public function material() {
    return $this->belongsTo(Material::class);
  }

  public function cleared_users()
  {
    return $this->belongsToMany(User::class)->withTimestamps();
  }

  public function count_cleared_users($schoolId) {
    if ($schoolId > 0) {
      $users = $this->cleared_users()->where('school_id', $schoolId)->get();
    } else {
      $users = $this->cleared_users()->get();
    }

    return count($users);
  }

  public function getClearedUsersAttribute() {
    return $this->count_cleared_users(0);
  }
}