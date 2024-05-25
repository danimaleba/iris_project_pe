<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sleep;

class SleepController extends Controller
{
    public function index(){
        return Sleep::all();
    }

    public function create(Request $request, $id){
        try {
            $JsonPayload = $request->getContent();
            $dataArray = json_decode($JsonPayload, true);
            if($dataArray===null) return response()->json(['error'=>'JSON inválido']);

            foreach ($dataArray as $data) {
                $sleep = Sleep::where('summaryId', $data["summaryId"])->first();
                if(!$sleep){
                    $sleep = new Sleep;
                    $sleep->participantId = $id;
                    $sleep->summaryId = $data["summaryId"];
                    $sleep->calendarDate = $data["calendarDate"];
                    $sleep->durationInSeconds = $data["durationInSeconds"];
                    $sleep->startTimeInSeconds = $data["startTimeInSeconds"];
                    $sleep->startTimeOffsetInSeconds = $data["startTimeOffsetInSeconds"];
                    $sleep->unmeasurableSleepInSeconds = $data["unmeasurableSleepInSeconds"];
                    $sleep->deepSleepDurationInSeconds = $data["deepSleepDurationInSeconds"];
                    $sleep->lightSleepDurationInSeconds = $data["lightSleepDurationInSeconds"];
                    $sleep->remSleepInSeconds = $data["remSleepInSeconds"];
                    $sleep->awakeDurationInSeconds = $data["awakeDurationInSeconds"];
                    $sleep->validation = $data["validation"];
                    $sleep->timeOffsetSleepSpo2 = json_encode($data["timeOffsetSleepSpo2"]);
                    $sleep->overallSleepScore = json_encode($data["overallSleepScore"]);
                    $sleep->sleepScores = json_encode($data["sleepScores"]);
                    $sleep->save();
                }
            }

            return response()->json(['message' => 'Dados inseridos com sucesso'], 201);

        } catch (\Exception $e) {
            // Captura da exceção e manipulação do erro
            return response()->json(['error' => 'Ocorreu um erro: ' . $e], 500);
        }
    }

    public function show($id){
        return response()->json(
            Sleep::where('participantId', $id)->get()
        );
    }
}
