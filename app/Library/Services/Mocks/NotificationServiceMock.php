<?php

namespace App\Library\Services\Mocks;

use App\CentcoinHistory;
use App\Library\Services\NotificationServiceInterface;
use App\Post;

class NotificationServiceMock implements NotificationServiceInterface {
    public function sendNotify($tokens, $title, $messageText, $action): void {

    }

    public function sendNewPostNotify(Post $post): void {

    }

    public function sendCentcoinNotify(CentcoinHistory $centcoin): void {

    }
}
