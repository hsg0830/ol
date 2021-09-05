<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteMonthIndexFromTasks extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('tasks', function (Blueprint $table) {
      $table->dropColumn('month_index');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('tasks', function (Blueprint $table) {
      $table->unsignedInteger('month_index')->after('month')->comment('月内の順序');
    });
  }
}