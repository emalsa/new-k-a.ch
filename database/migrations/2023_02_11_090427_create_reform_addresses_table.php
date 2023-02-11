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
    Schema::create('reform_addresses', function (Blueprint $table) {
      $table->id();
      $table->foreignId('person_id');
      $table->string('streetAddress');
      $table->string('streetAdditionalAddress')->nullable();
      $table->string('postalAddress');
      $table->string('locationAddress');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('reform_addresses');
  }

};
