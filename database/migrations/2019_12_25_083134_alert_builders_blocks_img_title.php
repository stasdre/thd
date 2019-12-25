<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertBuildersBlocksImgTitle extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('builder_landing_blocks', function (Blueprint $table) {
      $table->string('img_title_l', 191)->nullable();
      $table->string('img_title_r', 191)->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('builder_landing_blocks', function (Blueprint $table) {
      $table->dropColumn(['img_title_l', 'img_title_r']);
    });
  }
}
