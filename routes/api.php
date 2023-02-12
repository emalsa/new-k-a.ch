<?php

use App\Jobs\CreatePdfJob;
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

// To debug
Route::post('/pdf', 'App\Services\PdfGenerate@generate');

// Run queue worker, because there are some problems
// on the hoster side to run the queue workers via cron.
Route::post('queue-work/create-pdf/dispatch', function () {
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
Route::post('queue-work/create-pdf/work', function () {
  try {
    Artisan::call('queue:work --queue=pdfGenerate --stop-when-empty --max-jobs=20');
  }
  catch (\Exception $e) {
    Log::error('Error calling /api/queue-work/create-pdf/work route.');
    Log::error($e->getMessage());
  }
});