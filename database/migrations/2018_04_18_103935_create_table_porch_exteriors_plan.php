<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePorchExteriorsPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porch_exteriors_plan', function (Blueprint $table) {
            $table->integer('porch_exterior_id')->unsigned();
            $table->integer('plan_id')->unsigned();

            $table->primary(['porch_exterior_id', 'plan_id']);

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('porch_exterior_id')->references('id')->on('porch_exteriors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('porch_exteriors_plan', function (Blueprint $table) {
            $table->dropForeign('porch_exteriors_plan_plan_id_foreign');
            $table->dropForeign('porch_exteriors_plan_porch_exterior_id_foreign');
        });

        Schema::dropIfExists('porch_exteriors_plan');
    }
}
