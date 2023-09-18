<?php

namespace App\Services;

use App\Models\Person;
use App\Models\Session;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class CreatePerson {

  protected Request $request;

  protected $validator;

  public function __construct(Request $request) {
    $this->request = $request;
  }

  public function session(Request $request): void {
    Session::create([
      'userIp' => $request->json('userIp'),
      'count' => 1,
      'confidence' => $request->json('confidence'),
      'visitorId' => $request->json('visitorId'),
      'userIpLocation' => $request->json('userIpLocation'),
      'incognito' => $request->json('incognito'),
      'browserName' => $request->json('browserName'),
      'browserVersion' => $request->json('browserVersion'),
      'firstSeenAtGlobal' => $request->json('firstSeenAtGlobal'),
      'firstSeenAtSubscription' => $request->json('firstSeenAtSubscription'),
      'device' => $request->json('device'),
      'os' => $request->json('os'),
      'osVersion' => $request->json('osVersion'),
      'requestId' => $request->json('requestId'),
    ]);
  }

  public function handle(): JsonResponse {
    $this->validateRequest();
    if ($this->validator->fails()) {
      return response()->json($this->validator->messages(), 500);
    }

    /** @var \App\Models\Person $person */
    $personPostData = $this->request->json('person');
    $formData = $this->request->json('formData');
    $person = Person::create(
      [
        'email' => $personPostData['email'],
        'taufDatumBekanntPerson' => $personPostData['taufDatumBekanntPerson'] ?? FALSE,
        'vorname' => $personPostData['vorname'] ?? '',
        'nachname' => $personPostData['nachname'] ?? '',
        'geburtsdatum' => $personPostData['geburtsdatum'],
        'konfession' => $personPostData['konfession'],
        'taufdatum' => $personPostData['taufdatum'] ?? '',
        'taufort' => $personPostData['taufort'] ?? '',
        'streetAddress' => $personPostData['streetAddress'] ?? '',
        'streetAdditionalAddress' => $personPostData['streetAdditionalAddress'] ?? '',
        'postalAddress' => $personPostData['postalAddress'] ?? '',
        'locationAddress' => $personPostData['locationAddress'] ?? '',
        'hasChildren' => $formData['hasChildren'],
        'payment' => $formData['payment'],
        'hasPaid' => FALSE,
        'confirmationMailSent' => FALSE,
        'documentsCreated' => FALSE,
        'documentsSent' => FALSE,
      ]);

    $person->gemeinde()->create([]);

    if ($formData['hasChildren']) {
      $childrenPostData = $this->request->json('children');
      foreach ($childrenPostData as $index => $childPostData) {
        $person->children()->create([
          'vorname' => $childPostData['vorname'] ?? '',
          'nachname' => $childPostData['nachname'] ?? '',
          'geburtsdatum' => $childPostData['geburtsdatum'] ?? '',
          'konfession' => $childPostData['konfession'] ?? '',
          'taufDatumBekanntChild' => $childPostData['taufDatumBekanntChild'] ?? FALSE,
          'taufdatum' => $childPostData['taufdatum'] ?? '',
          'taufort' => $childPostData['taufort'] ?? '',
          'sign' => $childPostData['sign'],
        ]);
      }
    }

    $churchPostData = $this->request->json('church');
    $churchAnschriftAddress = $churchPostData['anschriftAddress'] ?? '';
    $churchStreetAddress = $churchPostData['streetAddress'] ?? '';
    $churchStreetAdditionalAddress = $churchPostData['streetAdditionalAddress'] ?? '';
    $churchPostalAddress = $churchPostData['postalAddress'] ?? '';
    $churchLocationAddress = $churchPostData['locationAddress'] ?? '';

    // Church
    $person->churchAddress()->create([
      'confession' => isset($formData['isCatholic']) && $formData['isCatholic'] ? 'kath' : 'reform',
      'anschriftAddress' => $churchAnschriftAddress,
      'streetAddress' => $churchStreetAddress,
      'streetAdditionalAddress' => $churchStreetAdditionalAddress,
      'postalAddress' => $churchPostalAddress,
      'locationAddress' => $churchLocationAddress,
    ]);

    return response()->json(['status' => 'ok'], 200);
  }

  protected function validateRequest() {
    $this->validator = Validator::make($this->request->all(),
      [
        //        'payment' => 'required',
      ],
      [
        //        'payment.required' => 'payment required',
        //        'type.required' => 'You have to choose type of the file!',
      ]
    );
    $a = 1;
  }

}
