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
    Schema::create('children', function(Blueprint $table) {
      $table->id();
      $table->foreignId('person_id');
      $table->string('vorname')->nullable();
      $table->string('nachname')->nullable();
      $table->string('geburtsdatum');
      $table->string('konfession');
      $table->boolean('taufDatumBekanntChild')->nullable();
      $table->string('taufdatum')->nullable();
      $table->string('taufort')->nullable();
      $table->boolean('sign');

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
