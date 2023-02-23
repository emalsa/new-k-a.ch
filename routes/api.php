<?php

use App\Jobs\CreatePdfJob;
use App\Jobs\SendPdfJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::post('/create-person', 'App\Services\CreatePerson@handle');
Route::post('/assets', 'App\Services\CreatePerson@session');
Route::post('/contact', 'App\Services\Contact@handle');
// To debug
Route::post('/pdf', 'App\Services\PdfGenerate@generate');

// Run queue worker, because there are some problems
// on the hoster side to run the queue workers via cron.
Route::get('queue-work/create-pdf/dispatch', function () {
  try {
    CreatePdfJob::store();
  }
  catch (\Exception $e) {
    Log::error('Error calling /api/queue-work/create-pdf/dispatch route.');
    Log::error($e->getMessage());
  }
});

// Run queue worker, because there are some problems
// on the hoster side to run the queue workers via cron.
Route::get('queue-work/create-pdf/work', function () {
  try {
    Artisan::call('queue:work --queue=pdfGenerate --stop-when-empty --max-jobs=2');
  }
  catch (\Exception $e) {
    Log::error('Error calling /api/queue-work/create-pdf/work route.');
    Log::error($e->getMessage());
  }
});


// Run queue worker, because there are some problems
// on the hoster side to run the queue workers via cron.
Route::get('queue-work/send-pdf/dispatch', function () {
  try {
    SendPdfJob::store();
  }
  catch (\Exception $e) {
    Log::error('Error calling /api/queue-work/send-pdf/dispatch route.');
    Log::error($e->getMessage());
  }
});

// Run queue worker, because there are some problems
// on the hoster side to run the queue workers via cron.
Route::get('queue-work/send-pdf/work', function () {
  try {
    Artisan::call('queue:work --queue=pdfSend --stop-when-empty --max-jobs=5');
  }
  catch (\Exception $e) {
    Log::error('Error calling /api/queue-work/send-pdf/work route.');
    Log::error($e->getMessage());
  }
});