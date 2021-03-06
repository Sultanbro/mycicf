<?php

namespace App\Library\Services\Mocks;

use App\Library\Services\NotificationServiceInterface;

class NotificationServiceMock implements NotificationServiceInterface {
    public function sendNotify($tokens, $title, $messageText, $action) {

    }
}
