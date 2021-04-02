<?php

namespace App\Http\Controllers;

use App\CentcoinHistory;
use App\Library\Services\NotificationServiceInterface;
use App\Post;
use App\UserToken;
use Illuminate\Http\Request;

class NotificationController extends Controller {
    /**
     * @var NotificationServiceInterface
     */
    private $notificationService;

    public function __construct(NotificationServiceInterface $notificationService) {
        $this->notificationService = $notificationService;
    }

    public function setToken(Request $request) {
        $requestKey = null;
        foreach ($request->all() as $key => $value) {
            $requestKey = $key;
        }
        return response()->json([
            'success' => UserToken::setToken($requestKey)
        ]);
    }

    public function sendCoordinationNotify($ISN) {
        $title = "Согласование";
        $body = "К вам поступил документ на согласование";
        $tokens = [];

        foreach ($ISN as $isn) {
            $token = UserToken::getToken($isn);
            if (! $token) {
                continue;
            }

            $tokens = array_merge($tokens, $token);
        }

        if (count($tokens) > 0) {
            $this->notificationService->sendNotify($tokens, $title, $body, 'https://my.cic.kz/coordination');
        }
    }

    /**
     * @param $post Post
     *
     * @deprecated
     */
    public function sendNewPostNotify($post){
        $this->notificationService->sendNewPostNotify($post);
    }

    /**
     * @param $post Post
     */
    public function sendRecruitingNotify($isn){
//        $isn
        $title = "Рекрутинг | Найден кандидат";
        $body = "Рекрутер добавил данные кандидата";
        $tokens = [];
        foreach (UserToken::where('ISN', $isn)->get() as $token){
            array_push($tokens, $token->token);
        }
        $this->sendNotify($tokens, $title, $body, 'https://my.cic.kz/news');
    }
    /**
     * @param $post Post
     */
    public function sendRecruitingNotifyRefreshedData(Request $request){
//        $isn
        $isn = $request->isn;
        $title = "Рекрутинг | Обновлены данные";
        $body = "В заявке на поиск кандидата обновлены данные";
        $tokens = [];
        foreach (UserToken::where('ISN', $isn)->get() as $token){
            array_push($tokens, $token->token);
        }
        $this->sendNotify($tokens, $title, $body, 'http://127.0.0.1/recruiting');
    }

    /**
     * @param $centcoin CentcoinHistory
     *
     * @deprecated
     */
    public function sendCentcoinNotify(CentcoinHistory $centcoin) {
        $this->notificationService->sendCentcoinNotify($centcoin);
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
