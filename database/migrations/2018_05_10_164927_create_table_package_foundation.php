<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePackageFoundation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_foundation_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('foundation_options_id')->unsigned();
            $table->integer('plan_id')->unsigned();
            $table->float('price')->default(0);
            $table->json('files')->nullable();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('foundation_options_id')->references('id')->on('foundation_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_foundation_options');
    }
}
