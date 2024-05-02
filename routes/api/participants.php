<?php
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

Route::get('', [ParticipantController::class, 'getParticipants']);
Route::get('create', [ParticipantController::class, 'formCreateParticipant']);//->name("participants.create");
Route::post('create',[ParticipantController::class, 'createNewParticipant']);
Route::get('{id}', [ParticipantController::class, 'getParticipantId']);

