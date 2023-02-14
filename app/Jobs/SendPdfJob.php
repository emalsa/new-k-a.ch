<?php

namespace App\Jobs;

use App\Models\Person;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mailgun\HttpClient\HttpClientConfigurator;
use Mailgun\Hydrator\NoopHydrator;
use Mailgun\Mailgun;

class SendPdfJob implements ShouldQueue {

  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Send to me.
   *
   * @var string
   */
  protected const SEND_COPY_TO = "info@kirche-austreten.ch";

  /**
   * From.
   *
   * @var string
   */
  protected const FROM = 'kirche-austreten.ch info@mail.kirche-austreten.ch';

  /**
   * Alert: Subject.
   *
   * @var string
   */
  protected const SUBJECT = 'kirche-austreten.ch: Dein Austrittsformular ist fertig';

  /**
   * Register: Template.
   *
   * @var string
   */
  protected const PDF_TEMPLATE = 'documents__available';

  /**
   * The person entity
   *
   * @var \App\Models\Person
   */
  protected Person $person;

  /**
   * The Mailgun handler
   *
   * @var \Mailgun\Mailgun
   */
  protected Mailgun $mailgun;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(Person $person) {
    $this->person = $person;
  }

  /**
   * Selects the candidates to generate the pdf and dispatch the job into the queue.
   *
   * @return void
   */
  public static function store(): void {
    $person = Person::where([
      //      ['payment', '=', 0],
      ['readyToSendFinalMail', '=', 1],
      ['finalMailSent', '=', 0],
    ])->first();

    if (!empty($person) && $person instanceof Person) {
      SendPdfJob::dispatch($person)->onQueue('pdfSend');
      $person->setAttribute('finalMailSent', 1);
      $person->save();
    }

  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    try {
      $apiKey = env('MAILGUN_APIKEY');
      $configurator = new HttpClientConfigurator();
      $configurator->setEndpoint('https://api.eu.mailgun.net/v3/mail.kirche-austreten.ch/messages');
      $configurator->setApiKey($apiKey);
      $configurator->setDebug(TRUE);

      $mg = new Mailgun($configurator, new NoopHydrator());
      $files = Storage::disk('private')->files("{$this->person->getAttribute('email')}/{$this->person->getAttribute('id')}");


      $attachments = [];
      foreach ($files as $file) {
        // Is PDF?
        if (!pathinfo($file, PATHINFO_EXTENSION) == 'pdf') {
          continue;
        }

        $attachments[] = [
          'filePath' => Storage::disk('private')->path($file),
          'filename' => basename(Storage::disk('private')->path($file)),
        ];
      }

      if (empty($attachments)) {
        $message = 'Email not sent. No Pdf file available for: ' . $this->person->getAttributeValue('email');
        throw new \Exception($message);
      }

      $responsePerson = $mg->messages()->send('kirche-austreten.ch', [
          'from' => self::FROM,
          'to' => $this->person->getAttributeValue('email'),
          'subject' => self::SUBJECT,
          'template' => self::PDF_TEMPLATE,
          'attachment' => $attachments,
        ]
      );

      if ($responsePerson->getStatusCode() != 200) {
        $message = 'Mailgun responded not with a 200 for: ' . $this->person->getAttributeValue('email');
        throw new \Exception($message);
      }

      $responseCopy = $mg->messages()->send('kirche-austreten.ch', [
          'from' => self::FROM,
          'to' => self::SEND_COPY_TO,
          'subject' => self::SUBJECT,
          'template' => self::PDF_TEMPLATE,
          'attachment' => $attachments,
        ]
      );

    }
    catch (\Exception $exception) {
      Log::error('Mailgun Error: ' . $exception->getCode() . ' -- ' . $exception->getMessage());
      dd($exception->getMessage());
    }
  }


}
