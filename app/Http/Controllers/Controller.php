<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getMonthLabels(){
        return [
            1 => "Январь",
            2 => "Февраль",
            3 => "Март",
            4 => "Апрель",
            5 => "Май",
            6 => "Июнь",
            7 => "Июль",
            8 => "Август",
            9 => "Сентябрь",
            10 => "Октябрь",
            11 => "Ноябрь",
            12 => "Декабрь"
        ];
    }

    public function getQuarterLabels(){
        return [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4
        ];
    }

    public function testEds(){
        return view('eds');
    }

    public function getEDS(){
        $success = false;
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => "http://ncalayer.uchet.kz:8080/getSignToken",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{\n\t\"company_token\":\"7006cebf-82b9-4dbf-9cca-7d35d2eaf763\"\n}",
            CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
//        echo $response->token;

        //$response = (object)['token' => '90aff245-c06c-11ea-8948-000c296105aa'];
        //$response = json_decode((string)$response);
        if(isset($response->token)){
            $success = true;
        }
        return response()->json([
            'success' => $success,
            'result' => $response
        ]);
//        $client = new Client();
//        $res = $client->get('http://ncalayer.uchet.kz:8080/getSignToken', ['json' => ['company_token'=>'7006cebf-82b9-4dbf-9cca-7d35d2eaf763']]);
//        echo $res->getBody();
//        echo $res->getStatusCode();
    }
}
