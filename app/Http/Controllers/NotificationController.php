<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Centcoin;
use App\CentcoinHistory;
use App\Post;
use App\User;
use App\UserToken;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function setToken(Request $request){
        $requestKey = null;
        foreach($request->all() as $key => $value){
            $requestKey = $key;
        }
        return response()->json([
                'success' => UserToken::setToken($requestKey)
            ]);
    }

    public function sendCoordinationNotify($ISN){
        $title = "Согласование";
        $body = "К вам поступил документ на согласование";
        $tokens = [];
        foreach ($ISN as $isn){
            $token = UserToken::getToken($isn);
            if(!$token){
                continue;
            }else{
                $tokens = array_merge($tokens, $token);
            }
        }
        if(sizeof($tokens) > 0){
            $this->sendNotify($tokens, $title, $body, 'https://my.cic.kz/coordination');
        }
    }

    /**
     * @param $post Post
     */
    public function sendNewPostNotify($post){
        $title = "Новости";
        $author = (new User())->getFullName($post->user_isn);
        $body = "Опубликован новый пост от {$author}";
        $tokens = [];
        foreach (UserToken::all() as $token){
            array_push($tokens, $token->token);
        }
        $this->sendNotify($tokens, $title, $body, 'https://my.cic.kz/news');
    }

    /**
     * @param $centcoin CentcoinHistory
     */
    public function sendCentcoinNotify($centcoin){
        $title = "Сенткоин";
        $body = "Пополнение счета на {$centcoin->quantity} ₵";
        $tokens = UserToken::getToken($centcoin->changed_user_isn);
        if(!$tokens){
            return;
        }
        $this->sendNotify($tokens, $title, $body, 'https://my.cic.kz/centcoins');
    }

    public function sendNotify($tokens, $title, $messageText, $action){
        $url = 'https://fcm.googleapis.com/fcm/send';
        $YOUR_API_KEY = env('SERVER_KEY'); // Server key
        if($tokens) {
            $request_body = [
                'notification' => [
                    'title' => $title,
                    'body' => $messageText,
                    'icon' => "https://kupipolis.kz/images/new-logo-centras.png",
                    'click_action' => $action,
                ],
                'registration_ids' => $tokens
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