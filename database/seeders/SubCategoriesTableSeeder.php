<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategoriesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $name_data = [
      // 언어규범
      300 => [
        100 => '맞춤법',
        200 => '문화어발음법',
        300 => '띄여쓰기규정',
        400 => '기타',
      ]
    ];

    foreach ($name_data as $category_id => $names) {
      foreach ($names as $sub_category_id => $name) {
        $subCategory = new SubCategory();
        $subCategory->id = $sub_category_id;
        $subCategory->category_id = $category_id;
        $subCategory->name = $name;
        $subCategory->save();
      }
    }
  }
}