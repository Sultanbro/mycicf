<?php


namespace App\Library\Services;

use App\CentcoinHistory;
use App\Post;

interface NotificationServiceInterface {
    /**
     * @param mixed $tokens
     * @param mixed $title
     * @param mixed $messageText
     * @param mixed $action
     *
     * @return void
     */
    public function sendNotify($tokens, $title, $messageText, $action): void;

    /**
     * @param Post $post
     *
     * @return void
     */
    public function sendNewPostNotify(Post $post): void;

    /**
     * @param CentcoinHistory $centcoin
     */
    public function sendCentcoinNotify(CentcoinHistory $centcoin): void;
}
