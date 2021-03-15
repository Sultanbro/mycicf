<?php

namespace App\Library\Services;

use App\CentcoinHistory;
use App\Post;
use App\User;
use App\UserToken;

class NotificationService implements NotificationServiceInterface {
    /**
     * @param mixed $tokens
     * @param mixed $title
     * @param mixed $messageText
     * @param mixed $action
     */
    public function sendNotify($tokens, $title, $messageText, $action): void {
        $url = config('notifications.url');
        $YOUR_API_KEY = config('notifications.server_key');
        if ($tokens) {
            $request_body = [
                'notification'     => [
                    'title'        => $title,
                    'body'         => $messageText,
                    'icon'         => "https://kupipolis.kz/images/new-logo-centras.png",
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
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
            echo $response;
        } else {
            // echo 'ERROR';
        }
    }

    public function sendNewPostNotify(Post $post): void {
        $title = "Новости";
        $author = (new User())->getFullName($post->user_isn);
        $body = "Опубликован новый пост от {$author}";
        $tokens = [];
        foreach (UserToken::all() as $token) {
            $tokens[] = $token->token;
        }
        $this->sendNotify($tokens, $title, $body, 'https://my.cic.kz/news');
    }

    public function sendCentcoinNotify(CentcoinHistory $centcoin): void {
        $title = "Сенткоин";
        $body = "Пополнение счета на {$centcoin->quantity} ₵";
        $tokens = UserToken::getToken($centcoin->changed_user_isn);

        if (! $tokens) {
            return;
        }

        $this->sendNotify($tokens, $title, $body, 'https://my.cic.kz/centcoins');
    }
}
