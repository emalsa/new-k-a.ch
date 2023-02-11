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
    Schema::create('catholic_addresses', function (Blueprint $table) {
      $table->id();
      $table->foreignId(Person::class);
      $table->string('streetAddress');
      $table->string('streetAdditionalAddress');
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
    Schema::dropIfExists('catholic_addresses');
  }

};
