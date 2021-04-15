<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $category_ids = [100, 200, 300, 400];
    $sub_category_ids = [100, 200, 300, 400];

    for ($i = 1; $i <= 50; $i++) {
      $category_id = $category_ids[array_rand($category_ids)];
      $sub_category_id = $sub_category_ids[array_rand($sub_category_ids)];

      $article = new Article();
      $article->editor_id = 1;
      $article->category_id = $category_id;
      if ($category_id == 300) {
        $article->sub_category_id = $sub_category_id;
      }
      $article->title = $i . '番目の記事';
      $article->introduction = $i . '番目の記事のイントロダクショです。';
      $article->save();
    }
  }
}