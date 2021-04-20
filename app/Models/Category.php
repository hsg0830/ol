<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

    protected $appends = ['has_sub_category'];

    // Relationship
    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id')
            ->select('id', 'category_id', 'name');
    }

    // Accessor
    public function getHasSubCategoryAttribute()
    {
        return $this->sub_categories->isNotEmpty();
    }
}
