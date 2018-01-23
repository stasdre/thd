<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStylePlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('style_plan', function (Blueprint $table) {
            $table->integer('style_id')->unsigned();
            $table->integer('plan_id')->unsigned();

            $table->primary(['style_id', 'plan_id']);

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('style_plan', function (Blueprint $table) {
            $table->dropForeign('style_plan_plan_id_foreign');
            $table->dropForeign('style_plan_style_id_foreign');
        });

        Schema::dropIfExists('style_plan');
    }
}
