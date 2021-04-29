<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubContent;

class SubContentsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 1; $i <= 50; $i++) {
      $article_id = $i;

      for ($j = 1; $j <= 4; $j++) {
        $subContent = new SubContent();
        $subContent->article_id = $article_id;
        $subContent->order = $j;
        $subContent->title = $i . '番目の記事の' . $j . '番目のタイトル';
        $subContent->description = $i . '番目の記事の' . $j . '番目のタイトルに関する本文です。';
        $subContent->save();
      }
    }
  }
}