<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gemeinde extends Model {

  use HasFactory;

  protected $fillable = [
    'anschriftAddress',
    'streetAddress',
    'streetAdditionalAddress',
    'postalAddress',
    'locationAddress',
  ];

}
