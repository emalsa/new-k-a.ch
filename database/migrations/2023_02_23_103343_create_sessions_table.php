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
    Schema::create('sessions', function (Blueprint $table) {
      $table->id();
      $table->string('userIp')->nullable();
      $table->string('confidence')->nullable();
      $table->string('visitorId')->nullable();
      $table->string('userIpLocation')->nullable();
      $table->string('incognito')->nullable();
      $table->integer('count')->nullable();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('sessions');
  }

};
