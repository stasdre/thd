<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InspirationSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspiration-sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('title', 150)->nullable();
            $table->text('desc')->nullable();
            $table->string('logo_img', 50)->nullable();
            $table->string('brochure_link', 191)->nullable();
            $table->string('locator_link', 191)->nullable();
            $table->string('slider_img', 50)->nullable();
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('inspiration-sliders');
    }
}
