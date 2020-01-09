<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKitchenPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitchen_plan', function (Blueprint $table) {
            $table->integer('kitchen_id')->unsigned();
            $table->integer('plan_id')->unsigned();

            $table->primary(['kitchen_id', 'plan_id']);

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('kitchen_id')->references('id')->on('kitchens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kitchen_plan', function (Blueprint $table) {
            $table->dropForeign('kitchen_plan_plan_id_foreign');
            $table->dropForeign('kitchen_plan_kitchen_id_foreign');
        });

        Schema::dropIfExists('kitchen_plan');
    }
}
