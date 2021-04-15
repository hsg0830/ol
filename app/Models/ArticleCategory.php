<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\TestCategory;

class ArticleCategory extends TestCategory
{
    use HasFactory;

    protected static function booted(array $attributes = [])
    {
        // グローバルスコープで [1,2,3,4] で絞り込みwhere()
    }
}
