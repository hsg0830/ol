<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('materials', function (Blueprint $table) {
      $table->id();
      $table->unsignedInteger('category_key')->comment('カテゴリー');
      $table->unsignedInteger('type_key')->comment('ファイルの種別');
      $table->string('file_name')->comment('ファイル名');
      $table->unsignedInteger('size')->comment('ファイルのサイズ');
      $table->string('title')->comment('タイトル');
      $table->text('description')->comment('説明');
      // $table->string('file_ext')->comment('ファイルの拡張子');
      $table->boolean('status')->default(false)->comment('公開ステータス');
      $table->date('released_at')->nullable()->comment('公開日');
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
    Schema::dropIfExists('materials');
  }
}