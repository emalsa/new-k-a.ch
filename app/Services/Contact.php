<?php

namespace App\Services;

use App\Jobs\SendPdfJob;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Mailgun\HttpClient\HttpClientConfigurator;
use Mailgun\Hydrator\NoopHydrator;
use Mailgun\Mailgun;

class Contact {

  protected Request $request;

  protected $validator;

  public function __construct(Request $request) {
    $this->request = $request;
  }

  public function handle(Request $request) {
    try {
      $apiKey = env('MAILGUN_APIKEY');
      $configurator = new HttpClientConfigurator();
      $configurator->setEndpoint('https://api.eu.mailgun.net/v3/mail.kirche-austreten.ch/messages');
      $configurator->setApiKey($apiKey);
      $configurator->setDebug(TRUE);

      $mg = new Mailgun($configurator, new NoopHydrator());

      $vornameContact = $request->json('vorname');
      $emailContact = $request->json('email');
      $messageContact = $request->json('message');

      // Spam
      if (!empty($request->json('nachname'))) {
        Log::error('Maybe spammer: ' . $emailContact);
        return response()->json(['status' => 'ok'], 200);
      }

      $data = [
        'vorname' => $vornameContact,
        'email' => $emailContact,
        'message' => $messageContact,
      ];

      $responseContact = $mg->messages()->send('kirche-austreten.ch', [
          'from' => SendPdfJob::FROM,
          'to' => SendPdfJob::SEND_COPY_TO,
          'subject' => 'Kontaktformular von: ' . $emailContact,
          'template' => SendPdfJob::CONTACT_TEMPLATE,
          'h:X-Mailgun-Variables' => json_encode($data),
        ]
      );

      if ($responseContact->getStatusCode() != 200) {
        $message = 'Mailgun responded not with a 200 for contact: ' . $emailContact;
        throw new \Exception($message);
      }
    }
    catch (\Exception $exception) {
      Log::error($exception->getMessage());
      return response()->json(['status' => 'error'], 500);
    }

    return response()->json(['status' => 'ok'], 200);
  }

}
