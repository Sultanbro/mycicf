<?php


namespace App\Library\Services;

interface NotificationServiceInterface {
    /**
     * @param mixed $tokens
     * @param mixed $title
     * @param mixed $messageText
     * @param mixed $action
     */
    public function sendNotify($tokens, $title, $messageText, $action);
}
