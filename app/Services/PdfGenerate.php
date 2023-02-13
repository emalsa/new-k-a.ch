<?php

namespace App\Services;

use App\Models\Partner;
use App\Models\Person;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\ErrorHandler\Error\FatalError;


class PdfGenerate {


  public function generate(int $personId) {
    /** @var Person $person */
    $person = Person::find($personId);
    $partner = $person->partner()->first();
    $children = $person->children()->get();

    $catholicMode = ['children' => [], 'churchAddress' => [],];
    $reformMode = ['children' => [], 'churchAddress' => [],];

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
    foreach ($catholicMode as $key => $item) {
      // Children will be handled either with person or partner, but never alone.
      // Same for church address.
      if ($key == 'children' || $key == 'churchAddress') {
        continue;
      }
      $churchAddressData = $catholicMode['churchAddress'];
      $this->generatePDF('kath', $key, $item, $person, $hasChildren, $churchAddressData, $catholicMode['children']);
    }

    $hasChildren = !empty($reformMode['children']);
    foreach ($reformMode as $key => $item) {
      // Children will be handled either with person or partner, but never alone.
      // Same for church address.
      if ($key == 'children' || $key == 'churchAddress') {
        continue;
      }

      $churchAddressData = $reformMode['churchAddress'];
      $this->generatePDF('reform', $key, $item, $person, $hasChildren, $churchAddressData, $reformMode['children']);
    }
    $person->setAttribute('readyToSendFinalMail', TRUE);
    $person->save();
  }

  protected function generatePDF($mode, $key, $personData, $person, &$hasChildren, $churchAddressData, $children) {
    // We need the address from the person, because partner doesn't have it.
    if ($key === 'partner') {
      $personData['streetAddress'] = $person->getAttributeValue('streetAddress');
      $personData['streetAdditionalAddress'] = $person->getAttributeValue('streetAdditionalAddress');
      $personData['postalAddress'] = $person->getAttributeValue('postalAddress');
      $personData['locationAddress'] = $person->getAttributeValue('locationAddress');
    }

    if ($hasChildren) {
      $childrenData = $children;
      // Set to false now, since the children will be included, but not again on second iteration for partner.
      $hasChildren = FALSE;
    }
    else {
      $childrenData = [];
    }
    $currentDate = $this->getGermanDate();
    try {
      $fileStorage = Storage::disk('private');
      $filePathFull = "{$person->getAttributeValue('email')}/{$person->getAttributeValue('id')}/{$mode}_austritt_{$key}.pdf";
      $pdf = Pdf::loadView('austritt', compact('personData', 'childrenData', 'churchAddressData', 'currentDate', 'mode'))->setPaper('a4');
      $pdf->save($filePathFull, 'private');

      if (!$fileStorage->exists($filePathFull)) {
        throw new \Exception('File does not exist: ' . $filePathFull);
      }
    }
    catch (\Exception $exception) {
      Log::error('Error generating PDF for: ' . $person->getAttributeValue('email'));
      Log::error($exception->getMessage());
      dd($exception->getMessage());

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