<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Centcoin;
use App\CentcoinHistory;
use App\Library\Services\NotificationServiceInterface;
use App\Post;
use App\User;
use App\UserToken;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * @var NotificationServiceInterface
     */
    private $notificationService;

    public function __construct(NotificationServiceInterface $notificationService) {
        $this->notificationService = $notificationService;
    }

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
        $this->notificationService->sendNotify($tokens, $title, $body, 'https://my.cic.kz/news');
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
        $this->notificationService->sendNotify($tokens, $title, $body, 'https://my.cic.kz/centcoins');
    }

    /**
     * @param $tokens
     * @param $title
     * @param $messageText
     * @param $action
     *
     * @deprecated
     */
    public function sendNotify($tokens, $title, $messageText, $action) {
        $this->notificationService->sendNotify($tokens, $title, $messageText, $action);
    }
}
