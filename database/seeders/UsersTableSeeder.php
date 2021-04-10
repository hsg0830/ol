<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 0; $i < 25; $i++) {

      $user = new User();
      $user->name = 'ユーザー ' . $i;
      $user->email = 'user' . $i . '@example.com';
      $user->sex = rand(1, 2);
      $user->birth_year = 2021;
      $user->birth_month = 4;
      $user->birth_day = 10;
      $user->birth_date = '2021-04-10';
      $user->school_id = rand(1, 59);
      $user->password = Hash::make('password');
      $user->last_login = now();
      $user->save();
    }
  }
}