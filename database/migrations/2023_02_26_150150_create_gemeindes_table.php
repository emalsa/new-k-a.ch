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
    Schema::create('gemeindes', function(Blueprint $table) {
      $table->id();
      $table->foreignId('person_id');
      $table->string('anschriftAddress')->nullable();
      $table->string('streetAddress')->nullable();
      $table->string('streetAdditionalAddress')->nullable();
      $table->string('postalAddress')->nullable();
      $table->string('locationAddress')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('gemeindes');
  }

};
