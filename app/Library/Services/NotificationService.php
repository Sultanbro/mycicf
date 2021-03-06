<?php

namespace App\Library\Services;

class NotificationService implements NotificationServiceInterface {
    /**
     * @param mixed $tokens
     * @param mixed $title
     * @param mixed $messageText
     * @param mixed $action
     */
    public function sendNotify($tokens, $title, $messageText, $action) {
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
}
