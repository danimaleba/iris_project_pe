<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hrv;

class HrvController extends Controller
{
    public function index(){
        return Hrv::all();
    }
    public function create(Request $request, $id){
        try {
            $jsonPayload = $request->getContent();
            
            $dataArray = json_decode($jsonPayload, true);
            
            if ($dataArray === null) {
                return response()->json(['error' => 'JSON inválido'], 400);
            }

            foreach ($dataArray as $data) {
                $hrv = Hrv::where('summaryId', $id)->first();
                if(!$hrv){
                    $hrv = new Hrv;
                    $hrv->participantId = $id;
                    $hrv->summaryId = $data["summaryId"];
                    $hrv->calendarDate = $data["calendarDate"];
                    $hrv->lastNightAvg = $data["lastNightAvg"];
                    $hrv->lastNight5MinHigh = $data["lastNight5MinHigh"];
                    $hrv->startTimeOffsetInSeconds = $data["startTimeOffsetInSeconds"];
                    $hrv->durationInSeconds = $data["durationInSeconds"];
                    $hrv->startTimeInSeconds = $data["startTimeInSeconds"];
                    $hrv->hrvValues = json_encode($data["hrvValues"]);
                    $hrv->save();
                }
            }

            return response()->json(['message' => 'Dados inseridos com sucesso'], 201);

        } catch (\Exception $e) {
            // Captura da exceção e manipulação do erro
            return response()->json(['error' => 'Ocorreu um erro: ' . $e], 500);
        }
    }

    public function show($id){
        return response()->json(Hrv::where('participantId', $id)->get());
    }
}
