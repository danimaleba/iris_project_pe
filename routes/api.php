<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ParticipantController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\DailyController;
use App\Http\Controllers\Api\EpochController;
use App\Http\Controllers\Api\HrvController;
use App\Http\Controllers\Api\PulseOxController;
use App\Http\Controllers\Api\RespirationController;
use App\Http\Controllers\Api\SleepController;

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

// Activity
Route::post('api/activity', [ActivityController::class, 'create']); // Cria um activity relacionado a um participante

// Daily
Route::post('api/daily',[DailyController::class, 'create']); // Cria um daily relacionado a um participante

// epoch
Route::post('api/epoch',[EpochController::class, 'create']);

// Hrv
Route::post('api/hrv', [HrvController::class, 'create']);

// PulseOx
Route::post('api/pulseox', [PulseOxController::class, 'create']);

// Respiration
Route::post('api/respiration', [RespirationController::class, 'create']);

// Sleep
Route::post('api/sleep', [SleepController::class, 'create']);



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
