<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('sessions', function (Blueprint $table) {
      $table->string('browserName')->nullable();
      $table->string('browserVersion')->nullable();
      $table->string('firstSeenAtGlobal')->nullable();
      $table->string('firstSeenAtSubscription')->nullable();
      $table->string('device')->nullable();
      $table->string('os')->nullable();
      $table->string('osVersion')->nullable();
      $table->string('requestId')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('sessions', function (Blueprint $table) {
      //
    });
  }

};
