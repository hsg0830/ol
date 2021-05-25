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
    $this->call(CategoriesTableSeeder::class);
    $this->call(SubCategoriesTableSeeder::class);

    if (env('APP_ENV') === 'local') {
      $this->call(UsersTableSeeder::class);
      $this->call(EditorsTableSeeder::class);
      $this->call(MediaTableSeeder::class);
      $this->call(ArticlesTableSeeder::class);
      $this->call(SubContentsTableSeeder::class);
      $this->call(QuestionsTableSeeder::class);
      $this->call(AsksTableSeeder::class);
      $this->call(ContactsTableSeeder::class);
      $this->call(NoticesTableSeeder::class);
    }
  }
}