<?php

use App\Models\Person;
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
    Schema::create('children', function (Blueprint $table) {
      $table->id();
      $table->foreignId(Person::class);
      $table->string('vorname');
      $table->string('nachname');
      $table->string('geburtsdatum');
      $table->string('konfession');
      $table->string('taufDatumBekanntPerson');
      $table->string('taufdatum');
      $table->string('taufort');
      $table->string('isCatholic');
      $table->string('isReform');
      $table->string('paid');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('children');
  }

};
