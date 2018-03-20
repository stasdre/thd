<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertTablePlanImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_images', function (Blueprint $table) {
            $table->boolean('first_image');
            $table->boolean('for_search');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_images', function (Blueprint $table) {
            $table->dropColumn(['first_image', 'for_search']);
        });
    }
}
