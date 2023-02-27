<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model {

  use HasFactory;

  protected $fillable = [
    'userIp',
    'confidence',
    'visitorId',
    'userIpLocation',
    'count',
    'incognito',
    'browserName',
    'browserVersion',
    'firstSeenAtGlobal',
    'firstSeenAtSubscription',
    'device',
    'os',
    'osVersion',
    'requestId',
  ];

}
