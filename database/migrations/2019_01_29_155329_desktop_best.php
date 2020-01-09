<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DesktopBest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desktop_best', function (Blueprint $table) {
            $table->increments('id');

            $table->string('main_title', 191)->nullable();
            $table->text('main_desc')->nullable();
            $table->string('main_plan', 191)->nullable();
            $table->string('main_link', 191)->nullable();
            $table->string('main_file', 50)->nullable();

            $table->string('first_type', 10)->nullable();
            $table->string('first_title', 191)->nullable();
            $table->text('first_desc')->nullable();
            $table->string('first_plan', 191)->nullable();
            $table->string('first_link', 191)->nullable();
            $table->string('first_file', 50)->nullable();

            $table->string('second_type', 10)->nullable();
            $table->string('second_title', 191)->nullable();
            $table->text('second_desc')->nullable();
            $table->string('second_plan', 191)->nullable();
            $table->string('second_link', 191)->nullable();
            $table->string('second_file', 50)->nullable();

            $table->string('third_type', 10)->nullable();
            $table->string('third_title', 191)->nullable();
            $table->text('third_desc')->nullable();
            $table->string('third_plan', 191)->nullable();
            $table->string('third_link', 191)->nullable();
            $table->string('third_file', 50)->nullable();

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
        Schema::dropIfExists('desktop_best');
    }
}
