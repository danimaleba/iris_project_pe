<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Respiration;

class RespirationController extends Controller
{
    public function index(){
        return Respiration::all();
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
                $respiration = Respiration::where('summaryId', $data["summaryId"])->first();
                if(!$respiration){
                    $respiration = new Respiration;
                    $respiration->participantId = $id;
                    $respiration->summaryId = $data["summaryId"];
                    $respiration->startTimeInSeconds = $data["startTimeInSeconds"];
                    $respiration->durationInSeconds = $data["durationInSeconds"];
                    $respiration->startTimeOffsetInSeconds = $data["startTimeOffsetInSeconds"];
                    $respiration->timeOffsetEpochToBreaths = json_encode($data["timeOffsetEpochToBreaths"]);
                    $respiration->timeOffset300 = $data["timeOffsetEpochToBreaths"]["300"];
                    $respiration->timeOffset420 = $data["timeOffsetEpochToBreaths"]["420"];
                    $respiration->timeOffset540 = $data["timeOffsetEpochToBreaths"]["540"];
                    // dd($respiration);
                    $respiration->save();
                }
            }

            return response()->json(['message' => 'Dados inseridos com sucesso'], 201);

        } catch (\Exception $e) {
            // Captura da exceção e manipulação do erro
            return response()->json(['error' => 'Ocorreu um erro: ' . $e], 500);
        }
    }

    public function show($id){
        return response()->json(Respiration::where('participantId', $id)->get());
    }
}
