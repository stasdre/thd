<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('url', 191)->nullable();
            $table->text('description')->nullable();
            $table->string('file', 50);
            $table->string('caption', 191)->nullable();
            $table->boolean('quote')->default(0);
            $table->string('plan', 191)->nullable();
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
        Schema::dropIfExists('mobile_galleries');
    }
}
