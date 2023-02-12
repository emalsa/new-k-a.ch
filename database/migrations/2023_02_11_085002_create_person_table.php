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
      $table->string('email');
      $table->string('vorname');
      $table->string('nachname');
      $table->string('geburtsdatum');
      $table->string('konfession');
      $table->boolean('taufDatumBekanntPerson')->nullable();
      $table->string('taufdatum')->nullable();
      $table->string('taufort')->nullable();
      $table->string('streetAddress');
      $table->string('streetAdditionalAddress')->nullable();
      $table->string('postalAddress');
      $table->string('locationAddress');
      $table->string('hatEhepartner');
      $table->string('hasChildren');
      $table->boolean('payment');
      $table->boolean('hasPaid')->nullable();
      $table->boolean('readyToSendFinalMail');
      $table->boolean('confirmationMailSent');
      $table->boolean('finalMailSent');
      $table->boolean('donationMailSent');

      $table->timestamps();
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
