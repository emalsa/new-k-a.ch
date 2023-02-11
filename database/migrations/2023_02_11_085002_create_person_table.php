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
    Schema::create('person', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('email');
      $table->string('vorname');
      $table->string('nachname');
      $table->string('geburtsdatum');
      $table->string('konfession');
      $table->string('taufDatumBekanntPerson');
      $table->string('taufdatum');
      $table->string('taufort');
      $table->string('streetAddress');
      $table->string('streetAdditionalAddress');
      $table->string('postalAddress');
      $table->string('locationAddress');
      $table->string('isCatholic');
      $table->string('isReform');
      $table->string('hatEhepartner');
      $table->string('hasChildren');
      $table->string('paid');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('person');
  }

};
