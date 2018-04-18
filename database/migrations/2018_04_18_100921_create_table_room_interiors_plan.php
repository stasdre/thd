<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoomInteriorsPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_interiors_plan', function (Blueprint $table) {
            $table->integer('room_interior_id')->unsigned();
            $table->integer('plan_id')->unsigned();

            $table->primary(['room_interior_id', 'plan_id']);

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('room_interior_id')->references('id')->on('room_interiors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_interiors_plan', function (Blueprint $table) {
            $table->dropForeign('room_interiors_plan_plan_id_foreign');
            $table->dropForeign('room_interiors_plan_room_interior_id_foreign');
        });

        Schema::dropIfExists('room_interiors_plan');
    }
}
