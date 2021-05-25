<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notice;

class NoticesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 1; $i <= 30; $i++) {
      $notice = new Notice();
      $notice->editor_id = 1;
      $notice->role = rand(0, 1);
      $notice->title =$i . '番目のお知らせです。';
      if ($notice->role == 1) {
        $notice->description = $i . '番目のお知らせの詳細です。';
      }
      $notice->save();
    }
  }
}