<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('firstName', 191)->nullable();
            $table->string('lastName', 191)->nullable();
            $table->string('street', 191)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 4)->nullable();
            $table->integer('zip')->nullable();
            $table->string('email', 191)->nullable();
            $table->string('phone', 100)->nullable();

            $table->string('bil_street', 191)->nullable();
            $table->string('bil_city', 100)->nullable();
            $table->string('bil_state', 4)->nullable();
            $table->integer('bil_zip')->nullable();

            $table->boolean('builder')->default(0);
            $table->enum('how', ['Google', 'Bing/Yahoo', 'Pinterest', 'Other/Referral']);
            $table->string('how_txt', 191)->nullable();

            $table->boolean('pay_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
