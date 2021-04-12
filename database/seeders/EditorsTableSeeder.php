<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Editor;
use Illuminate\Support\Facades\Hash;

class EditorsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $editor = new Editor();
    $editor->name = "한성구";
    $editor->email = "admin@example.com";
    $editor->password = Hash::make("password");
    $editor->role = 1;
    $editor->save();
  }
}