<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionalsFieldsForPlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->text('description')->nullable()->change();

            $table->integer('plan_number')->unsigned();
            $table->text('short_description')->nullable();
            $table->string('meta_title', 100)->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn(['plan_number', 'short_description', 'meta_title', 'meta_description', 'is_active']);
        });
    }
}
