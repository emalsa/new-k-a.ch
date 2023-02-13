<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchAddress extends Model {

  use HasFactory;

  protected $fillable = [
    'confession',
    'anschriftAddress',
    'streetAddress',
    'streetAdditionalAddress',
    'postalAddress',
    'locationAddress',
  ];

}
