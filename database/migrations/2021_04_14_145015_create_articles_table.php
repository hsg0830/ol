<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('articles', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('editor_id')->comment('投稿者ID');
      $table->unsignedBigInteger('category_id')->comment('カテゴリーID');
      $table->unsignedBigInteger('sub_category_id')->nullable()->comment('サブカテゴリーID');
      $table->string('title')->comment('タイトル');
      $table->text('introduction')->comment('イントロダクション');
      $table->boolean('status')->default(false)->comment('公開ステータス');
      $table->timestamp('released_at')->nullable()->comment('公開日時');
      $table->unsignedInteger('viewed_count')->default(0)->comment('閲覧数');
      $table->timestamps();

      $table->foreign('editor_id')->references('id')->on('editors');
      $table->foreign('category_id')->references('id')->on('categories');
      $table->foreign('sub_category_id')->references('id')->on('sub_categories');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('articles');
  }
}