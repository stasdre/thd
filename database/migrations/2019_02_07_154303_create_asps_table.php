<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 191);
            $table->string('subtitle', 191)->nullable();
            $table->text('desc')->nullable();
            $table->string('image', 50);
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
        Schema::dropIfExists('asps');
    }
}
