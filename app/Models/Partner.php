<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model {

  protected $fillable = [
    'vorname',
    'nachname',
    'geburtsdatum',
    'konfession',
    'taufDatumBekanntPartner',
    'taufdatum',
    'taufort',
  ];

  use HasFactory;
}
