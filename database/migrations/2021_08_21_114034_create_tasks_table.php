<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tasks', function (Blueprint $table) {
      $table->id();
      $table->unsignedInteger('year')->comment('年');
      $table->unsignedInteger('month')->comment('月');
      $table->unsignedInteger('month_index')->comment('月内の順序');
      $table->date('start')->comment('開始日');
      $table->date('end')->comment('終了日');
      $table->unsignedInteger('category_id')->comment('カテゴリー');
      $table->foreignId('article_id')->nullable()->constrained();
      $table->foreignId('ask_id')->nullable()->constrained();
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
    Schema::dropIfExists('tasks');
  }
}