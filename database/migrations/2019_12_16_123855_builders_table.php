<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuildersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('builders', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name', 100);
      $table->string('city', 100)->nullable();
      $table->string('state', 50)->nullable();
      $table->integer('zip')->nullable();
      $table->string('link', 191)->nullable();
      $table->text('description')->nullable();
      $table->string('img', 50)->nullable();
      $table->boolean('show_landing')->default(0);
      $table->boolean('recently_built')->default(0);
      $table->string('recently_title', 100)->nullable();
      $table->string('phtoto_link', 191)->nullable();
      $table->string('recently_img', 50)->nullable();
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
    Schema::dropIfExists('builders');
  }
}
