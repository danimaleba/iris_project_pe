<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Daily;

class DailyController extends Controller
{
    public function index(){
        return Daily::all();
    }
    public function create(Request $request, $id){
        try {

            // Obter o JSON do corpo da requisição
            $jsonPayload = $request->getContent();
            
            
            // Verificar se o JSON é válido e decodificar em um array
            $dataArray = json_decode($jsonPayload, true);
            
            // Verificar se a decodificação do JSON foi bem-sucedida
            if ($dataArray === null) {
                return response()->json(['error' => 'JSON inválido'], 400);
            }

            foreach ($dataArray as $data) {
                $daily = Daily::where('summaryId', $data["summaryId"])->where('participantId', $id)->first();
                if(!$daily){
                    $daily = new Daily;
                    $daily->participantId = $id;
                    $daily->summaryId = $data["summaryId"];
                    $daily->calendarDate = $data["calendarDate"];
                    $daily->activityType = $data["activityType"];
                    $daily->activeKilocalories = $data["activeKilocalories"];
                    $daily->bmrKilocalories = $data["bmrKilocalories"];
                    $daily->steps = $data["steps"];
                    $daily->distanceInMeters = $data["distanceInMeters"];
                    $daily->durationInSeconds = $data["durationInSeconds"];
                    $daily->activeTimeInSeconds = $data["activeTimeInSeconds"];
                    $daily->startTimeInSeconds = $data["startTimeInSeconds"];
                    $daily->startTimeOffsetInSeconds = $data["startTimeOffsetInSeconds"];
                    $daily->moderateIntensityDurationInSeconds = $data["moderateIntensityDurationInSeconds"];
                    $daily->vigorousIntensityDurationInSeconds = $data["vigorousIntensityDurationInSeconds"];
                    $daily->floorsClimbed = $data["floorsClimbed"];
                    $daily->minHeartRateInBeatsPerMinute = $data["minHeartRateInBeatsPerMinute"];
                    $daily->maxHeartRateInBeatsPerMinute = $data["maxHeartRateInBeatsPerMinute"];
                    $daily->averageHeartRateInBeatsPerMinute = $data["averageHeartRateInBeatsPerMinute"];
                    $daily->restingHeartRateInBeatsPerMinute = $data["restingHeartRateInBeatsPerMinute"];
                    $daily->timeOffsetHeartRateSamples = json_encode($data["timeOffsetHeartRateSamples"]);
                    $daily->stepsGoal = $data["stepsGoal"];
                    $daily->intensityDurationGoalInSeconds = $data["intensityDurationGoalInSeconds"];
                    $daily->floorsClimbedGoal = $data["floorsClimbedGoal"];
                    $daily->averageStressLevel = $data["averageStressLevel"];
                    $daily->maxStressLevel = $data["maxStressLevel"];
                    $daily->stressDurationInSeconds = $data["stressDurationInSeconds"];
                    $daily->restStressDurationInSeconds = $data["restStressDurationInSeconds"];
                    $daily->activityStressDurationInSeconds = $data["activityStressDurationInSeconds"];
                    $daily->lowStressDurationInSeconds = $data["lowStressDurationInSeconds"];
                    $daily->mediumStressDurationInSeconds = $data["mediumStressDurationInSeconds"];
                    $daily->highStressDurationInSeconds = $data["highStressDurationInSeconds"];
                    //dd($daily);
                    $daily->save();
                }
            }

            return response()->json(['message' => 'Dados inseridos com sucesso'], 201);

        } catch (\Exception $e) {
            // Captura da exceção e manipulação do erro
            return response()->json(['error' => 'Ocorreu um erro: ' . $e], 500);
        }
    }
    public function show($id){
        return response()->json(Daily::where('participantId', $id)->get());
    }
    public function delete(){}
    public function update(){}
}
