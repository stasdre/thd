<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldAltImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_images', function (Blueprint $table) {
            $table->string('alt_text', 191)->nullable();
        });
        Schema::table('plan_image_firsts', function (Blueprint $table) {
            $table->string('alt_text', 191)->nullable();
        });
        Schema::table('plan_image_seconds', function (Blueprint $table) {
            $table->string('alt_text', 191)->nullable();
        });
        Schema::table('plan_image_basements', function (Blueprint $table) {
            $table->string('alt_text', 191)->nullable();
        });
        Schema::table('plan_image_bonus', function (Blueprint $table) {
            $table->string('alt_text', 191)->nullable();
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
            $table->dropColumn(['alt_text']);
        });
        Schema::table('plan_image_firsts', function (Blueprint $table) {
            $table->dropColumn(['alt_text']);
        });
        Schema::table('plan_image_seconds', function (Blueprint $table) {
            $table->dropColumn(['alt_text']);
        });
        Schema::table('plan_image_basements', function (Blueprint $table) {
            $table->dropColumn(['alt_text']);
        });
        Schema::table('plan_image_bonus', function (Blueprint $table) {
            $table->dropColumn(['alt_text']);
        });
    }
}
