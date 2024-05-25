<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Epoch;

class EpochController extends Controller
{
    public function index(){
        return Epoch::all();
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
                $epoch = Epoch::where('summaryId', $id)->first();
                if(!$epoch){
                    $epoch = new Epoch;
                    $epoch->participantId = $id;
                    $epoch->summaryId = $data['summaryId'];
                    $epoch->activityType = $data['activityType'];
                    $epoch->activeKilocalories = $data['activeKilocalories'];
                    $epoch->steps = $data['steps'];
                    $epoch->distanceInMeters = $data['distanceInMeters'];
                    $epoch->durationInSeconds = $data['durationInSeconds'];
                    $epoch->activeTimeInSeconds = $data['activeTimeInSeconds'];
                    $epoch->startTimeInSeconds = $data['startTimeInSeconds'];
                    $epoch->startTimeOffsetInSeconds = $data['startTimeOffsetInSeconds'];
                    $epoch->met = $data['met'];
                    $epoch->intensity = $data['intensity'];
                    $epoch->meanMotionIntensity = $data['meanMotionIntensity'];
                    $epoch->maxMotionIntensity = $data['maxMotionIntensity'];
                    $epoch->save();
                }
            }

            return response()->json(['message' => 'Dados inseridos com sucesso'], 201);

        } catch (\Exception $e) {
            // Captura da exceção e manipulação do erro
            return response()->json(['error' => 'Ocorreu um erro: ' . $e], 500);
        }
    }

    public function show($id){
        return response()->json(Epoch::where('participantId', $id)->get());
    }
}
