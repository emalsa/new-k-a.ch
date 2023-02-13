<?php

namespace App\Jobs;

use App\Models\Person;
use App\Services\PdfGenerate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePdfJob implements ShouldQueue {

  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected Person $person;

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
      ['payment', '=', 0],
      ['readyToSendFinalMail', '=', 0],
      ['finalMailSent', '=', 0],
    ])->first();

    if (!empty($person) && $person instanceof Person) {
      CreatePdfJob::dispatch($person)->onQueue('pdfGenerate');
    }

  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    $pdfGenerate = new PdfGenerate();
    $pdfGenerate->generate($this->person->getKey());
  }


}
