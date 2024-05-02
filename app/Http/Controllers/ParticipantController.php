<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{
    public function getParticipants() {
        $participants = Participant::all();
        return view('participants/participants', ['participants'=>$participants]);
    }

    public function getParticipantId(Request $request, $id) {
        $participant = Participant::where('id', $id)->first();
        return view('participants/viewParticipant', ['participant'=>$participant]);
    }

    public function formCreateParticipant() {
        return view('participants/participantCreate');
    }
    public function createNewParticipant(Request $request) {
        $participant = new Participant;
        $participant->uat = $request->input("uat");
        $participant->date_in = $request->input("date_in");
        $participant->smartWatch = $request->input("smartWatch");

        $participant->save();
        return redirect('participants/'.$participant->id)->with("msg", "Participante cadastrado com sucesso!");
    }
}
