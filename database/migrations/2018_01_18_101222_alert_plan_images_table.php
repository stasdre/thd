<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertPlanImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_images', function (Blueprint $table) {
            $table->renameColumn('label', 'title');
            $table->text('description')->nullable();
            $table->smallInteger('sort_number')->unsigned()->default(0);
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
            $table->renameColumn('title', 'label');
            $table->dropColumn('description');
            $table->dropColumn('sort_number');
        });
    }
}
