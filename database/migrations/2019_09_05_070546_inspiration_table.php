<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InspirationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspirations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->boolean('in_menu')->default(0);
            $table->string('link', 100);
            $table->string('title', 150)->nullable();
            $table->string('img_above_logo', 50)->nullable();
            $table->string('logo_img', 50)->nullable();
            $table->text('short_desc')->nullable();
            $table->string('brochure_link', 191)->nullable();
            $table->string('locator_link', 191)->nullable();
            $table->string('main_img', 50)->nullable();
            $table->string('main_img_link', 191)->nullable();
            $table->string('first_img', 50)->nullable();
            $table->string('first_img_link', 191)->nullable();
            $table->string('second_img', 50)->nullable();
            $table->string('second_img_link', 191)->nullable();
            $table->string('third_img', 50)->nullable();
            $table->string('third_img_link', 191)->nullable();
            $table->text('desc')->nullable();
            $table->json('products')->nullable();
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
        Schema::dropIfExists('inspirations');
    }
}
