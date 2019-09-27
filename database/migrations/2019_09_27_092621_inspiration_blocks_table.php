<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InspirationBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspiration-blocks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_title_l_t', 150)->nullable();
            $table->string('title_l_t', 150)->nullable();
            $table->text('desc_l_t')->nullable();
            $table->string('link_name_l_t', 100)->nullable();
            $table->string('link_l_t', 191)->nullable();
            $table->string('img_l_t', 50)->nullable();

            $table->string('first_title_r_t', 150)->nullable();
            $table->string('title_r_t', 150)->nullable();
            $table->text('desc_r_t')->nullable();
            $table->string('link_name_r_t', 100)->nullable();
            $table->string('link_r_t', 191)->nullable();
            $table->string('img_r_t', 50)->nullable();

            $table->string('first_title_b_l', 150)->nullable();
            $table->string('title_b_l', 150)->nullable();
            $table->text('desc_b_l')->nullable();
            $table->string('link_name_b_l', 100)->nullable();
            $table->string('link_b_l', 191)->nullable();
            $table->string('img_b_l', 50)->nullable();

            $table->string('first_title_b_r', 150)->nullable();
            $table->string('title_b_r', 150)->nullable();
            $table->text('desc_b_r')->nullable();
            $table->string('link_name_b_r', 100)->nullable();
            $table->string('link_b_r', 191)->nullable();
            $table->string('img_b_r', 50)->nullable();
            
            $table->timestamps();
        });       
        
        DB::table('inspiration-blocks')->insert([[]]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspiration-blocks');
    }
}
