<?php

namespace App\Http\Controllers\Admin;

use App\KolesaMarks;
use App\KolesaModel;
use App\Library\Services\KiasServiceInterface;
use App\Permissions;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function showLoginForm(){
        if(Auth::check()){
            return redirect('/index');
        }else {
            return view('login');
        }
    }

    public function dimaAdmin(){
        return view('/dima');
    }

    public function checkLogin(KiasServiceInterface $kias, Request $request){
        $success = true;
        $error = '';
        $username = $request->username;
        $password = $request->password;
        $response = $kias->authenticate($username, hash('sha512', $password));
        if($response->error)
        {
            $success = false;
            $error = (string)$response->error->text;
        }
        if($success && $response->UserDetails)
        {
            $userDetails = $response->UserDetails;
            if(($user = User::where('ISN', $userDetails->ISN)->first()) === null)
            {
                $user = new User();
                $user->ISN = $userDetails->ISN;
            }
            $kias->_sId = $response->Sid;
            $user->username = $username;
            $user->password_hash = hash('sha512', $password);
            $user->level = $this->getUpperLevel($user->ISN, $kias);
            $user->short_name = $userDetails->ShortName;
            $user->full_name = $userDetails->FullName;
            $user->session_id = $response->Sid;
            $user->dept_isn = $userDetails->DeptISN;
            try
            {
                $user->save();
                Auth::login($user);
            }
            catch (\Exception $ex)
            {
                $success = false;
                $error = "Ошибка при сохранении пользователя : ".$ex->getMessage();
            }
        }
//        if($success){
//            (new Permissions())->hasPermission($user);
//        }
        $response = array(
            'success' => $success,
            'error' => $error,
        );
        return response()->json($response)->withCallback($request->input('callback'));
    }

    public function getUpperLevel($ISN, KiasServiceInterface $kias)
    {
        if (in_array($ISN, $this->getTesters()))
        {
            return 1000;
        }
        else
        {
            $response = $kias->getUpperLevel($ISN);
            return $response->ISN ?? $ISN;
        }
    }

    public function getTesters()
    {
        return array(
            3921599 => 3921599,
            3600338 => 3600338,
            3130949 => 3130949,
            1445721 => 1445721
        );
    }

    public function index(){
        return view('index');
    }

    public function getModels(){
        $a = "1 Acura
2 Alfa Romeo
3 Alpina
6 Aston Martin
7 Audi
150 BAW
11 BMW
15 BYD
9 Bentley
140 Brilliance
14 Buick
16 Cadillac
17 Chana
122 Changan
18 Chery
19 Chevrolet
20 Chrysler
21 Citroen
137 Dacia
23 Daewoo
24 Daihatsu
25 Datsun
26 Dodge
27 Dong Feng
28 Eagle
29 FAW
30 Ferrari
31 Fiat
32 Ford
124 Foton
35 GMC
33 Geely
36 Great Wall
37 Hafei
149 Haima
158 Haval
40 Honda
41 Huanghai
42 Hummer
43 Hyundai
44 Infiniti
152 Iran Khodro
45 Isuzu
46 JAC
49 JMC
47 Jaguar
48 Jeep
128 Jin Bei
50 Kia
51 Lamborghini
52 Lancia
53 Land Rover
164 Landwind
54 Lexus
55 Lifan
56 Lincoln
119 Luxgen
129 MG
59 Maserati
60 Maybach
61 Mazda
62 Mercedes-Benz
154 Mercedes-Maybach
63 Mercury
64 Mini
65 Mitsubishi
66 Nissan
68 Opel
69 Peugeot
72 Pontiac
73 Porsche
162 Puch
166 Ravon
76 Renault
80 Renault Samsung
77 Rolls-Royce
78 Rover
79 Saab
81 Saturn
83 Scion
84 Seat
153 Shuanghuan
86 Skoda
87 Smart
89 SsangYong
90 Subaru
91 Suzuki
123 Tesla
94 Tianma
96 Toyota
98 Volkswagen
99 Volvo
130 Wuling
103 Yutong
106 ZX
107 ВАЗ (Lada)
108 ВИС
109 ГАЗ
136 ЕрАЗ
110 ЗАЗ
112 ИЖ
113 ЛуАЗ
114 Москвич
117 РАФ
145 Ретро-автомобили
163 СМЗ
118 ТагАЗ
116 УАЗ";
        $texts = explode("\r\n", $a);
        foreach ($texts as $text){
            $mark = explode(' ', $text);
            $table = new KolesaMarks();
            $table->mark_id = $mark[0];
            unset($mark[0]);
            $table->mark_label = implode(' ', $mark);
            $table->save();
        }
    }

    public function getModelss(){
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        $marks = KolesaMarks::all();
        foreach ($marks as $mark){
            $sleepTime = rand(1,5);
            sleep($sleepTime);
            $markId= $mark->mark_id;
            $url = "https://kolesa.kz/a/ajax-get-value-parameter/?dependent=auto.car.mm%5B1%5D&name=auto.car.mm&value%5B0%5D=$markId&category=2&order-form=1";
            $file = json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));
            foreach ($file->value as $item) {
                if(!strpos($item->key,',')){
                    $table = new KolesaModel();
                    $table->parent_id = $markId;
                    $table->model_name = $item->value;
                    $table->model_id = $item->key;
                    $table->save();
                }
            }
        }
    }
}
