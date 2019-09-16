<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkAboveLogoInspirationAlert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspirations', function (Blueprint $table) {
            $table->string('img_above_logo_link', 191)->nullable(0);
        });                        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspirations', function (Blueprint $table) {
            $table->dropColumn(['img_above_logo_link']);
        });                        
    }
}
