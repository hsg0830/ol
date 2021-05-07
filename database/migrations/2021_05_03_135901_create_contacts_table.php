<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contacts', function (Blueprint $table) {
      $table->id();
      $table->string('name', 10)->comment('名前');
      $table->string('email')->comment('メールアドレス');
      $table->text('description')->comment('問い合わせ内容');
      $table->boolean('status')->default(false)->comment('回答状況');
      $table->timestamp('replied_at')->nullable()->comment('回答日');
      $table->unsignedBigInteger('editor_id')->nullable()->comment('回答者ID');
      $table->text('reply')->nullable()->comment('回答内容');
      $table->timestamps();

      $table->foreign('editor_id')->references('id')->on('editors');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('contacts');
  }
}