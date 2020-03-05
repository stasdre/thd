<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoUserTable extends Migration
{
    public function up()
    {
        Schema::create('promo_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('promo_id')->unsigned();

            $table->primary(['user_id', 'promo_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('promo_id')->references('id')->on('promos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promo_user', function (Blueprint $table) {
            $table->dropForeign('promo_user_user_id_foreign');
            $table->dropForeign('promo_user_promo_id_foreign');
        });

        Schema::dropIfExists('promo_user');
    }
}
