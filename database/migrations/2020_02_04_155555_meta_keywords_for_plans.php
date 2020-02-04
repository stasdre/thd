<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MetaKeywordsForPlans extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('plans', function (Blueprint $table) {
      $table->text('meta_keywords')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('plans', function (Blueprint $table) {
      $table->dropColumn(['meta_keywords']);
    });
  }
}
