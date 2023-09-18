<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model {

  protected $fillable = [
    'vorname',
    'nachname',
    'geburtsdatum',
    'konfession',
    'taufDatumBekanntChild',
    'taufdatum',
    'taufort',
    'sign',
  ];

  use HasFactory;
}
