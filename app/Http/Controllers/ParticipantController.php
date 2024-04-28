<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{
    public function getParticipants() {
        $participants = Participant::all();
        return view('participants', ['participants'=>$participants]);
    }
}
