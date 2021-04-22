<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
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
    $categories = ArticleCategory::with('sub_categories')->get();

    for ($i = 1; $i <= 50; $i++) {
      $category = $categories->random();

      $article = new Article();
      $article->editor_id = 1;
      $article->category_id = $category->id;
      if ($category->has_sub_category) {
        $article->sub_category_id = $category->sub_categories->random()->id;
      }
      $article->title = $i . '番目の記事';
      $article->introduction = $i . '番目の記事のイントロダクションです。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。';
      $article->viewed_count = rand(1, 100);
      $article->status = rand(0, 1);
      if ($article->status == 1) {
        $article->released_at = now();
      }
      $article->save();
    }
  }
}