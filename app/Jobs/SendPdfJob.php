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
use Mailgun\Mailgun;

class SendPdfJob implements ShouldQueue {

  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


  /**
   * Send to me.
   *
   * @var string
   */
  protected const SEND_COPY = "setaloro@gmail.com";

  /**
   * From.
   *
   * @var string
   */
  protected const FROM = 'kirche-austreten.ch support@mail.kirche-austreten.ch';

  /**
   * Alert: Subject.
   *
   * @var string
   */
  protected const SUBJECT = 'kirche-austreten.ch: Dein Austrittsformular ist da!';

  /**
   * Register: Template.
   *
   * @var string
   */
  protected const PDF_TEMPLATE = 'documents__available';


  protected Person $person;

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
    }

    $person->setAttribute('finalMailSent', TRUE);
    $person->save();

  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    $this->mailgun = Mailgun::create(env('MAILGUN_APIKEY'));
    $files = Storage::disk('private')->files("{$this->person->getAttribute('email')}/{$this->person->getAttribute('id')}");
    $attachments = [];
    foreach ($files as $file) {
      $attachments[] = [
        'filePath' => Storage::disk('private')->path($file),
        'filename' => 'Wow.pdf',
      ];
    }

    try {
      $this->mailgun->messages()->send('kirche-austreten.ch', [
          'from' => self::FROM,
          'to' => $this->person->getAttributeValue('email'),
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
