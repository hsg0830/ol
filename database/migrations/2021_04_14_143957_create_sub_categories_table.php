<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('sub_categories', function (Blueprint $table) {
      $table->id();

      // 親カテゴリのIDを追加し 1:多 で結合するようにすると、将来的に新カテゴリにサブカテゴリが追加されてもOKになるので楽できるかもしれません ^^
      $table->unsignedBigInteger('category_id')->comment('親カテゴリーID');
      $table->string('name', 10)->comment('サブカテゴリー名');
      $table->timestamps();

      $table->foreign('category_id')->references('id')->on('categories');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('sub_categories');
  }
}
