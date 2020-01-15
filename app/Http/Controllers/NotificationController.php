<?php

namespace App\Http\Controllers;

use App\UserToken;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function setToken(Request $request){
        $requestKey = null;
        foreach($request->all() as $key => $value){
            $requestKey = $key;
        }
        return UserToken::setToken($requestKey);
    }

    public function sendNotify(){
        $ISN = 3921599;
        $title = 'Согласование';
        $messageText = 'Вам поступил документ на согласование';
        $url = 'https://fcm.googleapis.com/fcm/send';
        $YOUR_API_KEY = env('SERVER_KEY'); // Server key
        $YOUR_TOKEN_ID = UserToken::getToken($ISN); // Client token id
        if($YOUR_TOKEN_ID) {
            $request_body = [
                'notification' => [
                    'title' => $title,
                    'body' => $messageText,
                    'icon' => 'https://eralash.ru.rsz.io/sites/all/themes/eralash_v5/logo.png?width=192&height=192',
                    'click_action' => 'https://my.cic.kz/coordination',
                ],
                'registration_ids' => $YOUR_TOKEN_ID
            ];

            $fields = json_encode($request_body);
            $request_headers = [
                'Content-Type: application/json',
                'Authorization: key=' . $YOUR_API_KEY,
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $response = curl_exec($ch);
            curl_close($ch);
            echo $response;
        }else{
            echo 'ERROR';
        }
    }
}
