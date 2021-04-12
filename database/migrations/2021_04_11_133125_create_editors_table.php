<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('editors', function (Blueprint $table) {
      $table->id();
      $table->string('name', 10)->comment('氏名');
      $table->string('email')->unique()->comment('メールアドレス');
      $table->string('password')->comment('パスワード');
      $table->unsignedInteger('role')->default(0)->comment('権限');
      $table->timestamp('email_verified_at')->nullable();
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('editors');
  }
}