<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaragePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garage_plan', function (Blueprint $table) {
            $table->integer('garage_id')->unsigned();
            $table->integer('plan_id')->unsigned();

            $table->primary(['garage_id', 'plan_id']);

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('garage_id')->references('id')->on('garages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('garage_plan', function (Blueprint $table) {
            $table->dropForeign('garage_plan_plan_id_foreign');
            $table->dropForeign('garage_plan_garage_id_foreign');
        });

        Schema::dropIfExists('garage_plan');
    }
}
