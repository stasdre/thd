<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertTableAboutDavid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_david', function (Blueprint $table) {
            $table->text('why_text')->nullable();
            $table->text('best_text')->nullable();
            $table->text('free_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_david', function (Blueprint $table) {
            $table->dropColumn(['why_text', 'best_text', 'free_text']);
        });
    }
}
