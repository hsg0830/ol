<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 0; $i < 10; $i++) {
      $contact = new Contact();
      $contact->name = '質問者' . $i;
      $contact->email = 'contact' . $i . '@example.com';
      $contact->description = '問い合わせの内容。\n文章が続きます。';
      $contact->save();
    }
  }
}