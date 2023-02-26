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
    'hatEhepartner',
    'hasChildren',
    'payment',
    'confirmationMailSent',
    'readyToSendFinalMail',
    'finalMailSent',
    'donationMailSent',
    'hasPaid',
  ];

  public function partner() {
    return $this->hasOne(Partner::class);
  }

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
