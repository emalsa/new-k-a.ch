<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model {

  use HasFactory;

  protected $table = 'person';

  protected $fillable = [
    'email',
    'vorname',
    'nachname',
    'geburtsdatum',
    'konfession',
    'taufDatumBekanntPerson',
    'taufdatum',
    'taufort',
    'streetAddress',
    'streetAdditionalAddress',
    'postalAddress',
    'locationAddress',
    'hasChildren',
    'payment',
    'confirmationMailSent',
    'documentsCreated',
    'documentsSent',
    'hasPaid',
  ];

  public function children() {
    return $this->hasMany(Child::class);
  }

  public function churchAddress() {
    return $this->hasOne(ChurchAddress::class);
  }

  public function gemeinde() {
    return $this->hasOne(Gemeinde::class);
  }

}
