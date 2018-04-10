<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('alt_email')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('alt_phone')->nullable();
            $table->string('mob_phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('zip', 50)->nullable();
            $table->string('country', 5)->nullable();
            $table->string('state', 5)->nullable();
            $table->string('city')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['alt_email', 'last_name', 'phone', 'company', 'alt_phone', 'mob_phone', 'fax', 'zip', 'country', 'state', 'city', 'address_1', 'address_2']);
        });
    }
}
