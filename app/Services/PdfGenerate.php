<?php

namespace App\Services;

use App\Models\Person;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PdfGenerate {

  public function generate(int $personId) {
    /** @var Person $person */
    $person = Person::find($personId);
    $children = $person->children()->get();

    $catholicMode = ['children' => [], 'churchAddress' => [],];
    $reformMode = ['children' => [], 'churchAddress' => [],];

    if ($person->getAttributeValue('konfession') === 'kath') {
      $catholicMode['person'] = $person;
    }
    else {
      $reformMode['person'] = $person;
    }

    foreach ($children as $child) {
      if ($child->getAttributeValue('konfession') === 'kath') {
        $catholicMode['children'][] = $child;
      }
      else {
        $reformMode['children'][] = $child;
      }
    }

    $catholicMode['churchAddress'] = $person->churchAddress()
      ->where('confession', '=', 'kath')
      ->first();
    $reformMode['churchAddress'] = $person->churchAddress()
      ->where('confession', '=', 'reform')
      ->first();

    $gemeindeAddressData = $person->gemeinde()->first();
    if (empty($gemeindeAddressData['streetAdditionalAddress'])) {
      $gemeindeAddressData['streetAdditionalAddress'] = 'Steuern';
    }

    $hasChildren = !empty($catholicMode['children']);
    foreach ($catholicMode as $key => $item) {
      // Children will be handled with person, but never alone.
      // Same for church address.
      if ($key == 'children' || $key == 'churchAddress') {
        continue;
      }
      $churchAddressData = $catholicMode['churchAddress'];
      $this->generatePDF('kath', $key, $item, $person, $hasChildren, $churchAddressData, $catholicMode['children']);
      // $this->generatePDFGemeinde('kath', $key, $item, $person, $hasChildren, $gemeindeAddressData, $catholicMode['children']);
    }

    $hasChildren = !empty($reformMode['children']);
    foreach ($reformMode as $key => $item) {
      // Children will be handled with person, but never alone.
      // Same for church address.
      if ($key == 'children' || $key == 'churchAddress') {
        continue;
      }

      $churchAddressData = $reformMode['churchAddress'];
      $this->generatePDF('reform', $key, $item, $person, $hasChildren, $churchAddressData, $reformMode['children']);
      // $this->generatePDFGemeinde('reform', $key, $item, $person, $hasChildren, $gemeindeAddressData, $reformMode['children']);
    }

    $person->setAttribute('documentsCreated', TRUE);
    $person->save();
  }

  /**
   * Generate Austrittsschreiben.
   */
  protected function generatePDF($mode, $key, $personData, $person, &$hasChildren, $churchAddressData, $children) {
    if ($hasChildren) {
      $childrenData = $children;
      // Set to false now, since the children will be included, but not again on second iteration for partner.
      $hasChildren = FALSE;
    }
    else {
      $childrenData = [];
    }

    try {
      $currentDate = $this->getGermanDate();

      $fileStorage = Storage::disk('private');
      $lastnameKey = self::cleanString($person->getAttributeValue('nachname'));
      $email = $person->getAttributeValue('email');
      $id = $person->getAttributeValue('id');
      $filePathFull = "{$email}/{$id}/kirchenaustritt_{$mode}_{$lastnameKey}.pdf";

      // Generate
      $pdf = Pdf::loadView('austritt', compact('personData', 'childrenData', 'churchAddressData', 'currentDate', 'mode'))
        ->setPaper('a4');
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
   * Generate Austrittsschreiben für Gemeinde.
   */
  protected function generatePDFGemeinde($mode, $key, $personData, $person, &$hasChildren, $gemeindeAddressData, $children) {
    if ($hasChildren) {
      $childrenData = $children;
      // Set to false now, since the children will be included, but not again on second iteration for partner.
      $hasChildren = FALSE;
    }
    else {
      $childrenData = [];
    }

    try {
      $currentDate = $this->getGermanDate();

      $fileStorage = Storage::disk('private');
      $lastnameKey = self::cleanString($person->getAttributeValue('nachname'));
      $email = $person->getAttributeValue('email');
      $id = $person->getAttributeValue('id');
      $filePathFull = "{$email}/{$id}/kirchenaustritt_{$mode}_{$lastnameKey}__gemeinde.pdf";

      // Generate
      $pdf = Pdf::loadView('austritt_gemeinde', compact('personData', 'childrenData', 'gemeindeAddressData', 'currentDate', 'mode'))
        ->setPaper('a4');
      $pdf->save($filePathFull, 'private');

      if (!$fileStorage->exists($filePathFull)) {
        throw new \Exception('File does not exist: ' . $filePathFull);
      }
    }
    catch (\Exception $exception) {
      Log::error('Error generating PDF Gemeinde for: ' . $person->getAttributeValue('email'));
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

  /**
   * Clean strings for save filename.
   *
   * @param string $string
   *
   * @return string
   */
  public static function cleanString(string $string): string {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '_', $string); // Removes special chars.
    $str = preg_replace('/-+/', '', $string);

    if (is_string($str)) {
      return strtolower($str);
    }

    return '_';
  }

}
