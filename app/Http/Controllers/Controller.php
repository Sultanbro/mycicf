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

    public function edsOD(){

        //$ch = curl_init();
// IMPORTANT: the below line is a security risk, read https://paragonie.com/blog/2017/10/certainty-automated-cacert-pem-management-for-php-software
// in most cases, you should set it to true
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_URL, 'http://lar.test:8001/refunds?token=ef292d4f1f2429cae344d090cc29b675&isn=506791');
//        $result = curl_exec($ch);
//        curl_close($ch);
//
//        $obj = json_decode($result);
//        print $result;


        $info = file_get_contents('http://lar.test:8001/refunds?token=ef292d4f1f2429cae344d090cc29b675&isn=506791');    //'http://t3.kupipolis.kz/refunds?token=ef292d4f1f2429cae344d090cc29b675&isn=506791');
        dd(json_decode($info));
        print gettype($info);exit();
        $info = json_decode($info, true);
        print_r((array)$info);
        $info = $info;
        $od = true;
        return view('eds',compact('info','od'));
    }
}
