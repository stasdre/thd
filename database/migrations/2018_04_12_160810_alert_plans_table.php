<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->string('designer', 20)->nullable();
            $table->integer('designer_id')->unsigned()->nullable();
            $table->foreign('designer_id')->references('id')->on('users')->onDelete('set null');
            $table->text('admin_note')->nullable();
            $table->json('details')->nullable();
            $table->json('rooms')->nullable();
            $table->json('similar')->nullable();
            $table->json('dimensions')->nullable();
            $table->json('square_ft')->nullable();
            $table->json('custom__sq_ft')->nullable();
            $table->json('construction')->nullable();
            $table->json('ceiling')->nullable();
            $table->json('roof')->nullable();
            $table->json('garage')->nullable();
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
            $table->dropForeign('plans_designer_id_foreign');
            $table->dropColumn(['designer', 'designer_id', 'admin_note', 'details', 'rooms', 'similar', 'dimensions', 'square_ft', 'custom__sq_ft', 'construction', 'ceiling', 'roof', 'garage']);
        });
    }
}
