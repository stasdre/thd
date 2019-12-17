<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuilderPreferredTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('builder_preferreds', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name', 100);
      $table->string('link', 191)->nullable();
      $table->string('plan', 100)->nullable();
      $table->string('img', 50)->nullable();
      $table->boolean('show_landing')->default(0);
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
    Schema::dropIfExists('builder_preferreds');
  }
}
