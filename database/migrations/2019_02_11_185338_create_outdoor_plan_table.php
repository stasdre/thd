<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutdoorPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outdoor_plan', function (Blueprint $table) {
            $table->integer('outdoor_id')->unsigned();
            $table->integer('plan_id')->unsigned();

            $table->primary(['outdoor_id', 'plan_id']);

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('outdoor_id')->references('id')->on('outdoors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outdoor_plan', function (Blueprint $table) {
            $table->dropForeign('outdoor_plan_plan_id_foreign');
            $table->dropForeign('outdoor_plan_outdoor_id_foreign');
        });

        Schema::dropIfExists('outdoor_plan');
    }
}
