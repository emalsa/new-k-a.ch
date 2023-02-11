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
    'paid'
  ];

  public function partner() {
    return $this->hasOne(Partner::class);
  }

  public function children() {
    return $this->hasMany(Child::class);
  }

  public function catholicAddress() {
    return $this->hasOne(CatholicAddress::class);
  }

  public function reformAddress() {
    return $this->hasOne(ReformAddress::class);
  }

}
