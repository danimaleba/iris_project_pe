<?php
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

Route::get('', [ParticipantController::class, 'getParticipants']);

