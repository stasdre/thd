<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertCheckoutAddPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->json('plans')->nullable();
            $table->json('promo')->nullable();
            $table->json('shipping')->nullable();
            $table->float('total')->nullable();
        });                                
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->dropColumn(['plans', 'shipping', 'promo', 'total']);
        });                                
    }
}
