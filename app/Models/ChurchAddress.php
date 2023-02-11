<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchAddress extends Model {

  use HasFactory;

  protected $fillable = [
    'confession',
    'streetAddress',
    'streetAdditionalAddress',
    'postalAddress',
    'locationAddress',
  ];

}
