<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name', 10)->comment('氏名');
      $table->string('email')->unique();
      $table->unsignedInteger('role')->default(0)->comment('権限');
      $table->unsignedInteger('sex')->default(0)->comment('性別');
      $table->unsignedInteger('birth_year')->comment('生年');
      $table->unsignedInteger('birth_month')->comment('生月');
      $table->unsignedInteger('birth_day')->comment('生日');
      $table->date('birth_date')->comment('生年月日');
      $table->unsignedBigInteger('school_id')->comment('所属校ID');
      $table->string('password')->comment('パスワード');
      $table->unsignedInteger('acceptance')->default(0)->comment('承認状況');
      $table->unsignedBigInteger('login_count')->default(1)->comment('ログイン回数');
      $table->date('last_login')->comment('最終ログイン日');
      $table->timestamp('email_verified_at')->nullable();
      $table->rememberToken();
      $table->timestamps();

      $table->foreign('school_id')->references('id')->on('schools');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}