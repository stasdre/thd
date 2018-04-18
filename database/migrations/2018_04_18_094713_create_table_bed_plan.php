<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBedPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed_plan', function (Blueprint $table) {
            $table->integer('bed_id')->unsigned();
            $table->integer('plan_id')->unsigned();

            $table->primary(['bed_id', 'plan_id']);

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('bed_id')->references('id')->on('beds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bed_plan', function (Blueprint $table) {
            $table->dropForeign('bed_plan_plan_id_foreign');
            $table->dropForeign('bed_plan_bed_id_foreign');
        });

        Schema::dropIfExists('bed_plan');
    }
}
