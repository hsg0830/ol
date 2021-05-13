<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medium;
use Illuminate\Support\Str;

class MediaTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $types = ["image", "video"];

    for ($i = 0; $i < 10; $i++) {

      $type = $types[rand(0, 1)];

      $extension = ($type === 'image')
        ? '.jpg'
        : '.mp4';

      $medium = new Medium();
      $medium->editor_id = 1;
      $medium->type = $type;
      $medium->filename = Str::random() . $extension;
      // $medium->poster = Str::random() . '.jpg';
      $medium->memo = $i . '個目のファイル';
      $medium->save();
    }
  }
}