<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCollectionPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_plan', function (Blueprint $table) {
            $table->integer('collection_id')->unsigned();
            $table->integer('plan_id')->unsigned();

            $table->primary(['collection_id', 'plan_id']);

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collection_plan', function (Blueprint $table) {
            $table->dropForeign('collection_plan_plan_id_foreign');
            $table->dropForeign('collection_plan_collection_id_foreign');
        });

        Schema::dropIfExists('collection_plan');
    }
}
