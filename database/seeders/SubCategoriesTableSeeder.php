<?php

namespace Database\Seeders;

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
    $names = [
      100 => '맞춤법',
      200 => '문화어발음법',
      300 => '띄여쓰기규정',
      400 => '기타',
    ];

    foreach ($names as $id => $name) {

      $subCategory = new SubCategory();
      $subCategory->id = $id;
      $subCategory->name = $name;
      $subCategory->save();
    }
  }
}