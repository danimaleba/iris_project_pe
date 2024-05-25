<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PulseOx;

class PulseOxController extends Controller
{
    public function index(){
        return PulseOx::all();
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
                $pulseOx = PulseOx::where('summaryId', $data["summaryId"])->first();
                if(!$pulseOx){
                    $pulseOx = new PulseOx;
                    $pulseOx->participantId = $id;
                    $pulseOx->summaryId = $data["summaryId"];
                    $pulseOx->calendarDate = $data["calendarDate"];
                    $pulseOx->startTimeInSeconds = $data["startTimeInSeconds"];
                    $pulseOx->durationInSeconds = $data["durationInSeconds"];
                    $pulseOx->startTimeOffsetInSeconds = $data["startTimeOffsetInSeconds"];
                    $pulseOx->timeOffsetSpo2Values_0 = $data["timeOffsetSpo2Values"]["0"];
                    $pulseOx->timeOffsetSpo2Values_3600 = $data["timeOffsetSpo2Values"]["3600"];
                    $pulseOx->onDemand = $data["onDemand"];
                    
                    $pulseOx->save();
                }
            }

            return response()->json(['message' => 'Dados inseridos com sucesso'], 201);

        } catch (\Exception $e) {
            // Captura da exceção e manipulação do erro
            return response()->json(['error' => 'Ocorreu um erro: ' . $e], 500);
        }
    }

    public function show($id){
        return response()->json(PulseOx::where('participantId', $id)->get());
    }
}
