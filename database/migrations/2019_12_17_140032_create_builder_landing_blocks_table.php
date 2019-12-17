<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuilderLandingBlocksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('builder_landing_blocks', function (Blueprint $table) {
      $table->increments('id');

      $table->string('first_title_l', 150)->nullable();
      $table->string('title_l', 150)->nullable();
      $table->text('desc_l')->nullable();
      $table->string('link_name_l', 100)->nullable();
      $table->string('link_l', 191)->nullable();
      $table->string('img_l', 50)->nullable();

      $table->string('first_title_r', 150)->nullable();
      $table->string('title_r', 150)->nullable();
      $table->text('desc_r')->nullable();
      $table->string('link_name_r', 100)->nullable();
      $table->string('link_r', 191)->nullable();
      $table->string('img_r', 50)->nullable();

      $table->timestamps();
    });

    DB::table('builder_landing_blocks')->insert([[]]);
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('builder_landing_blocks');
  }
}
