<?php

namespace App\Services;

use App\Models\Partner;
use App\Models\Person;
use App\Models\Session;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Validation\Validator;

class CreatePerson {

  protected Request $request;

  protected $validator;

  public function __construct(Request $request) {
    $this->request = $request;
  }

  public function session(Request $request) {
    Session::create([
      'userIp' => $request->json('userIp'),
      'count' => 1,
      'confidence' => $request->json('confidence'),
      'visitorId' => $request->json('visitorId'),
      'userIpLocation' => $request->json('userIpLocation'),
      'incognito'=>$request->json('incognito'),
    ]);
  }

  public function handle() {
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
        'taufDatumBekanntPerson' => $personPostData['taufDatumBekanntPerson'],
        'vorname' => $personPostData['vorname'],
        'nachname' => $personPostData['nachname'],
        'geburtsdatum' => $personPostData['geburtsdatum'],
        'konfession' => $personPostData['konfession'],
        'taufdatum' => $personPostData['taufdatum'],
        'taufort' => $personPostData['taufort'],
        'streetAddress' => $personPostData['streetAddress'],
        'streetAdditionalAddress' => $personPostData['streetAdditionalAddress'],
        'postalAddress' => $personPostData['postalAddress'],
        'locationAddress' => $personPostData['locationAddress'],
        'hatEhepartner' => $formData['hatEhepartner'],
        'hasChildren' => $formData['hasChildren'],
        'payment' => $formData['payment'],
        'confirmationMailSent' => FALSE,
        'readyToSendFinalMail' => FALSE,
        'finalMailSent' => FALSE,
        'donationMailSent' => FALSE,
        'hasPaid' => FALSE,
      ]);

    if ($formData['hatEhepartner']) {
      $partnerPostData = $this->request->json('partner');
      $partner = $person->partner()->create([
        'vorname' => $partnerPostData['vorname'],
        'nachname' => $partnerPostData['nachname'],
        'geburtsdatum' => $partnerPostData['geburtsdatum'],
        'konfession' => $partnerPostData['konfession'],
        'taufDatumBekanntPartner' => isset($partnerPostData['taufDatumBekanntPartner']) ? $partnerPostData['taufDatumBekanntPartner'] : FALSE,
        'taufdatum' => isset($partnerPostData['taufdatum']) ? $partnerPostData['taufdatum'] : '',
        'taufort' => isset($partnerPostData['taufort']) ? $partnerPostData['taufort'] : '',
      ]);
    }


    if ($formData['hasChildren']) {
      $childrenPostData = $this->request->json('children');
      foreach ($childrenPostData as $index => $childPostData) {
        $person->children()->create([
          'vorname' => $childPostData['vorname'],
          'nachname' => $childPostData['nachname'],
          'geburtsdatum' => $childPostData['geburtsdatum'],
          'konfession' => $childPostData['konfession'],
          'taufDatumBekanntChild' => isset($childPostData['taufDatumBekanntChild']) ? $childPostData['taufDatumBekanntChild'] : FALSE,
          'taufdatum' => isset($childPostData['taufdatum']) ? $childPostData['taufdatum'] : '',
          'taufort' => isset($childPostData['taufort']) ? $childPostData['taufort'] : '',
          'sign' => $childPostData['sign'],
        ]);
      }
    }

    if (!$formData['payment']) {
      $catholicPostData = $this->request->json('catholic');
      if ($formData['isCatholic']) {
        // Catholic
        $person->churchAddress()->create([
          'confession' => 'kath',
          'anschriftAddress' => $catholicPostData['anschriftAddress'],
          'streetAddress' => $catholicPostData['streetAddress'],
          'streetAdditionalAddress' => $catholicPostData['streetAdditionalAddress'],
          'postalAddress' => $catholicPostData['postalAddress'],
          'locationAddress' => $catholicPostData['locationAddress'],
        ]);
      }

      // Reform
      if ($formData['isReform']) {
        $reformPostData = $this->request->json('reform');
        $person->churchAddress()->create([
          'confession' => 'reform',
          'anschriftAddress' => $reformPostData['anschriftAddress'],
          'streetAddress' => $reformPostData['streetAddress'],
          'streetAdditionalAddress' => $reformPostData['streetAdditionalAddress'],
          'postalAddress' => $reformPostData['postalAddress'],
          'locationAddress' => $reformPostData['locationAddress'],
        ]);
      }
    }

    return response()->json(['status' => 'ok'], 200);

  }

  protected
  function validateRequest() {
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