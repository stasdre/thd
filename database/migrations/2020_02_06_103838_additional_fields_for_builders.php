<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionalFieldsForBuilders extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('builders', function (Blueprint $table) {
      $table->string('title', 100)->nullable();
      $table->string('view_photo_link', 191)->nullable();
      $table->string('recently_city', 100)->nullable();
      $table->string('recently_state', 50)->nullable();
      $table->string('recently_contact_link', 191)->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('builders', function (Blueprint $table) {
      $table->dropColumn(['title', 'view_photo_link', 'recently_city', 'recently_state', 'recently_contact_link']);
    });
  }
}
