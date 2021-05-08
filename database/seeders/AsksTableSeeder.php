<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ask;
use App\Models\QuestionCategory;

class AsksTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = QuestionCategory::with('sub_categories')->get();

    for ($i = 1; $i <= 50; $i++) {
      $user_id = rand(1, 5);

      $ask = new Ask();
      $ask->user_id = $user_id;
      $ask->draft = $user_id . 'の質問者からの質問のドラフトです。';
      $ask->status = rand(0, 1);

      if ($ask->status == 1) {
        $ask->editor_id = 1;

        $category = $categories->random();
        $ask->category_id = $category->id;

        if ($category->has_sub_category) {
          $ask->sub_category_id = $category->sub_categories->random()->id;
        }

        $ask->title = $i . '番目の質問のタイトル';
        $ask->description = $i . '番目の質問の内容です。<br>文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。';
        $ask->reply = $i . '番目の質問への回答です。<br>文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。';
        $ask->replied_at = now();
        $ask->viewed_count = rand(1, 100);
      }

      $ask->save();
    }
  }
}