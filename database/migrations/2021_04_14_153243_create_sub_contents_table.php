<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubContentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('sub_contents', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('article_id')->comment('記事ID');
      $table->unsignedInteger('order')->comment('順序');
      $table->string('title', 50)->comment('サブタイトル');
      $table->text('description')->comment('本文');
      $table->timestamps();

      $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('sub_contents');
  }
}