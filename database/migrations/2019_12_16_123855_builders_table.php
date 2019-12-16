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
      $table->string('state', 5)->nullable();
      $table->integer('zip')->nullable();
      $table->string('link', 191)->nullable();
      $table->text('description')->nullable();
      $table->string('img', 50)->nullable();
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
