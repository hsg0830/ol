<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAsksTableColumnStatus extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('asks', function (Blueprint $table) {
      $table->unsignedSmallInteger('status')->default(0)->change();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('asks', function (Blueprint $table) {
      $table->bool('status')->default(false)->change();
    });
  }
}