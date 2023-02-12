<?php

namespace App\Services;

use App\Models\Partner;
use App\Models\Person;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PdfGenerate {


  public function __construct(Request $request) {

  }

  public function generate() {
    //    string|int $personId
    $personId = 2;
    /** @var Person $person */
    $person = Person::find($personId);

    $partner = $person->partner()->first();
    //    $partner['reform'] = $person->partner()->where('konfession', '=', 'ref')->get();

    $children = $person->children()->get();
    //    $children['reform'] = $person->children()->where('konfession', '=', 'ref')->get();

    $catholicMode = [];
    $reformMode = [];

    if ($person->getAttributeValue('konfession') === 'kath') {
      $catholicMode['person'] = $person;
    }
    else {
      $reformMode['person'] = $person;
    }

    if ($partner instanceof Partner) {
      if ($partner->getAttributeValue('konfession') === 'kath') {
        $catholicMode['partner'] = $partner;
      }
      else {
        $reformMode['partner'] = $partner;
      }
    }

    foreach ($children as $child) {
      if ($child->getAttributeValue('konfession') === 'kath') {
        $catholicMode['children'][] = $child;
      }
      else {
        $reformMode['children'][] = $child;
      }
    }


    if (!$person->getAttributeValue('payment')) {
      $catholicMode['churchAddress'] = $person->churchAddress()->where('confession', '=', 'kath')->first();
      $reformMode['churchAddress'] = $person->churchAddress()->where('confession', '=', 'reform')->first();
    }


    $hasChildren = !empty($catholicMode['children']);
    foreach ($catholicMode as $key => $cathMode) {
      // Children will be handled either with person or partner, but never alone.
      // Same for church address.
      if ($key == 'children' || $key == 'churchAddress') {
        continue;
      }

      //      if ($key == 'person') {
      $personData = $cathMode;

      // We need the address, because partner doesn't have it
      if ($key === 'partner') {
        $personData['streetAddress'] = $person->getAttributeValue('streetAddress');
        $personData['streetAdditionalAddress'] = $person->getAttributeValue('streetAdditionalAddress');
        $personData['postalAddress'] = $person->getAttributeValue('postalAddress');
        $personData['locationAddress'] = $person->getAttributeValue('locationAddress');
      }
      $churchAddressData = $catholicMode['churchAddress'];
      if ($hasChildren) {
        $childrenData = $catholicMode['children'];
        // Set to false now, since the children will be included, but not again on second iteration for partner.
        $hasChildren = FALSE;
      }
      else {
        $childrenData = [];
      }
      $confessionFull = '';
      $currentDate = $this->getGermanDate();
      $pdf = Pdf::loadView('austritt', compact('personData', 'childrenData', 'churchAddressData', 'currentDate', 'confessionFull'))->setPaper('a4');
      $file = $pdf->save("public/kath_austritt_{$key}.pdf", 'local');
    }


  }

  /**
   * Fast and cheap getting written month in german.
   *
   * @return string
   * The date string.
   */
  protected function getGermanDate(): string {
    $currentMonth = date('m');
    $germanMonth = [
      '01' => 'Januar',
      '02' => 'Februar',
      '03' => 'März',
      '04' => 'April',
      '05' => 'Mai',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'August',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'Dezember',
    ];
    return date('d.') . ' ' . $germanMonth[$currentMonth] . ' ' . date('Y');
  }


}