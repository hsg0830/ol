<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateAsksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('asks', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id')->comment('質問者ID');
      $table->text('draft')->comment('投稿内容');
      $table->boolean('status')->default(false)->comment('回答状況');
      $table->unsignedBigInteger('editor_id')->nullable()->comment('回答者ID');
      $table->unsignedBigInteger('category_id')->nullable()->comment('カテゴリーID');
      $table->unsignedBigInteger('sub_category_id')->nullable()->comment('サブカテゴリーID');
      $table->string('title', 50)->nullable()->comment('タイトル');
      $table->text('description')->nullable()->comment('編集後の質問内容');
      $table->text('reply')->nullable()->comment('回答内容');
      $table->timestamp('replied_at')->nullable()->comment('回答日');
      $table->integer('viewed_count')->default(0)->comment('閲覧数');
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
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
    Schema::dropIfExists('asks');
  }
}