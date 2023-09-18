<?php

namespace App\Http\Controllers;

use App\Jobs\CreatePdfJob;
use App\Models\Person;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Stripe\Webhook;

class StripeController extends Controller {

  public function stripeWebhookHandler(Request $request) {
    // The library needs to be configured with your account's secret key.
    // Ensure the key is kept out of any version control system you might be using.
    $stripeApiKey = env('STRIPE_API_KEY');
    $stripe = new StripeClient($stripeApiKey);

    // This is your Stripe CLI webhook secret for testing your endpoint locally.
    $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    $event = NULL;

    try {
      $event = Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
      );
    }
    catch (\UnexpectedValueException $e) {
      // Invalid payload
      http_response_code(400);
      exit();
    }
    catch (\Stripe\Exception\SignatureVerificationException $e) {
      // Invalid signature
      http_response_code(400);
      exit();
    }

    // Handle the event
    switch ($event->type) {
      case 'charge.succeeded':
        $charge = $event->data->object;
        $email = $charge->receipt_email;
        $person = Person::where([
          ['payment', '=', 1],
          ['hasPaid', '=', 0],
          ['documentsCreated', '=', 0],
          ['documentsSent', '=', 0],
          ['email', '=', $email],
        ])->first();

        if (!empty($person) && $person instanceof Person) {
          $person->setAttribute('hasPaid', 1);
          $person->save();
        }
        break;
      default:
        echo 'Received unknown event type ' . $event->type;
    }

    http_response_code(200);
  }

}
