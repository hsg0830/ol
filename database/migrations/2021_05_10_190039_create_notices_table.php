<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('notices', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('editor_id')->comment('editorID');
      $table->unsignedInteger('role')->default(0)->comment('位置付け');
      $table->boolean('status')->default(false)->comment('公開状況');
      $table->string('title')->comment('概要');
      $table->text('description')->nullable()->comment('詳細');
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
    Schema::dropIfExists('notices');
  }
}