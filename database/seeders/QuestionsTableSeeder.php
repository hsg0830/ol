<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionCategory;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = QuestionCategory::with('sub_categories')->get();

    for ($i = 1; $i <= 150; $i++) {
      $category = $categories->random();

      $question = new Question();
      $question->editor_id = 1;
      $question->category_id = $category->id;
      if ($category->has_sub_category) {
        $question->sub_category_id = $category->sub_categories->random()->id;
      }
      $question->title = $i . '番目の質問';
      $question->answer = $i . '番目の質問へ回答です。<br>文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。文章が続きます。';
      $question->status = rand(0, 1);
      if ($question->status == 1) {
        $question->viewed_count = rand(1, 100);
        $question->released_at = now();
      }
      $question->save();
    }
  }
}