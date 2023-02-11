<?php

namespace App\Services;

use App\Models\Partner;
use App\Models\Person;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Validator;

//use Illuminate\Validation\Validator;

class CreatePerson {

  protected Request $request;

  protected $validator;

  public function __construct(Request $request) {
    $this->request = $request;
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
        'paid' => $formData['paid'],
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
        $data = [
          'vorname' => $childPostData['vorname'],
          'nachname' => $childPostData['nachname'],
          'geburtsdatum' => $childPostData['geburtsdatum'],
          'konfession' => $childPostData['konfession'],
          'taufDatumBekanntChild' => isset($childPostData['taufDatumBekanntChild']) ? $childPostData['taufDatumBekanntChild'] : FALSE,
          'taufdatum' => isset($childPostData['taufdatum']) ? $childPostData['taufdatum'] : '',
          'taufort' => isset($childPostData['taufort']) ? $childPostData['taufort'] : '',
        ];
        $a=1;
        $person->children()->create($data);
      }
      if (!empty($childElements)) {
        //        $children = $person->children()->createMany($childElements);
      }
    }

  }

  protected function validateRequest() {
    $this->validator = Validator::make($this->request->all(),
      [
        //        'paid' => 'required',
      ],
      [
        //        'paid.required' => 'Paid required',
        //        'type.required' => 'You have to choose type of the file!',
      ]
    );
    $a = 1;
  }


}