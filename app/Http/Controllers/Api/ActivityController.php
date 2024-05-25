<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index() {
        return Activity::All();
    }

    public function create(Request $request, $id) {
        try {
            
            // Obter o JSON do corpo da requisição
            $jsonPayload = $request->getContent();
            
            
            // Verificar se o JSON é válido e decodificar em um array
            $dataArray = json_decode($jsonPayload, true);
            
            // Verificar se a decodificação do JSON foi bem-sucedida
            if ($dataArray === null) {
                return response()->json(['error' => 'JSON inválido'], 400);
            }
            
            // Iterar sobre o array e inserir os dados no banco de dados
            foreach ($dataArray as $data) {
                $act = Activity::where('summaryId', $data["summaryId"])->first();
                if(!$act){
                    $act = new Activity;
                    $act->participantId = $id;
                    
                    $act->summaryId = $data["summaryId"];
                    $act->activityId = $data["activityId"];
                    $act->activityName = $data["activityName"];
                    $act->activityDescription = $data["activityDescription"];
                    $act->durationInSeconds = $data["durationInSeconds"];
                    $act->averageHeartRateInBeatsPerMinute = $data["averageHeartRateInBeatsPerMinute"];
                    $act->averageRunCadenceInStepsPerMinute = $data["averageRunCadenceInStepsPerMinute"];
                    $act->averageSpeedInMetersPerSecond = $data["averageSpeedInMetersPerSecond"];
                    $act->averagePaceInMinutesPerKilometer = $data["averagePaceInMinutesPerKilometer"];
                    $act->activeKilocalories = $data["activeKilocalories"];
                    $act->distanceInMeters = $data["distanceInMeters"];
                    $act->maxHeartRateInBeatsPerMinute = $data["maxHeartRateInBeatsPerMinute"];
                    $act->maxPaceInMinutesPerKilometer = $data["maxPaceInMinutesPerKilometer"];
                    $act->maxRunCadenceInStepsPerMinute = $data["maxRunCadenceInStepsPerMinute"];
                    $act->maxSpeedInMetersPerSecond = $data["maxSpeedInMetersPerSecond"];
                    $act->steps = $data["steps"];
                    $act->totalElevationGainInMeters = $data["totalElevationGainInMeters"];
                    $act->save();
                }
                
            }

            return response()->json(['message' => 'Dados inseridos com sucesso'], 201);
                
            
        } catch (\Throwable $th) {
            return response()->json([
                'msg'=>'fudeu',
                'error' => $th,
                'data'=> $data
            ], 500);
        }
    }

    public function show($id) {
        $act = Activity::where('participantId', $id)->get();

        return response()->json($act, 200);
    }
}
