<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterItemsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('footer_items', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name', 190);
      $table->string('link', 190);
      $table->integer('footer_block_id')->unsigned();
      $table->timestamps();

      $table->foreign('footer_block_id')->references('id')->on('footer_blocks')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('footer_items');
  }
}
