<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InspirationProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspiration-products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('link_name', 100)->nullable();
            $table->string('link', 191)->nullable();
            $table->string('img', 50)->nullable();
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
        Schema::dropIfExists('inspiration-products');
    }
}
