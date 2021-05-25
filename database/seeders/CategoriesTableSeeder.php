<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $names = [
      100 => '어휘',
      200 => '문법',
      300 => '언어규범',
      400 => '들어보기',
      500 => '기타',
    ];

    foreach ($names as $id => $name) {

      $category = new Category();
      $category->id = $id;
      $category->name = $name;
      $category->save();
    }
  }
}