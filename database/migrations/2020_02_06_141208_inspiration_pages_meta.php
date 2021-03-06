<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InspirationPagesMeta extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('inspirations', function (Blueprint $table) {
      $table->string('meta_title', 191)->nullable();
      $table->text('meta_desc')->nullable();
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
    Schema::table('inspirations', function (Blueprint $table) {
      $table->dropColumn(['meta_title', 'meta_desc', 'meta_keywords']);
    });
  }
}
