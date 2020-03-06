<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertTanleDesktopFavorite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('desktop_favorites', function (Blueprint $table) {
            $table->string('first_plan_link', 191)->nullable();
            $table->string('second_plan_link', 191)->nullable();
            $table->string('third_plan_link', 191)->nullable();
            $table->string('fourth_plan_link', 191)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desktop_favorites', function (Blueprint $table) {
            $table->dropColumn(['first_plan_link', 'second_plan_link', 'third_plan_link', 'fourth_plan_link']);
        });
    }
}
