<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablePlanImageBasements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_image_basements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('file_name', 50);
            $table->integer('plan_id')->unsigned()->nullable();
            $table->smallInteger('sort_number')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_image_basements');
    }
}
