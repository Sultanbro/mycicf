<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Client;

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
        $client = new Client();
        $res = $client->get('http://ncalayer.uchet.kz:8080/getSignToken', ['json' => ['company_token'=>'7006cebf-82b9-4dbf-9cca-7d35d2eaf763']]);
        echo $res->getBody();
        echo $res->getStatusCode();
    }

    public function getVersion(){
//        $res = $client->get("wss://127.0.0.1:13579/getVersion");
//        echo $res->getBody();
//        echo $res->getStatusCode();
    }
}
