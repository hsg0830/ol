<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();
    $this->call(SchoolsTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    $this->call(EditorsTableSeeder::class);
    $this->call(MediaTableSeeder::class);
    $this->call(CategoriesTableSeeder::class);
    $this->call(SubCategoriesTableSeeder::class);
    $this->call(ArticlesTableSeeder::class);
    $this->call(SubContentsTableSeeder::class);
    $this->call(ContactsTableSeeder::class);
  }
}