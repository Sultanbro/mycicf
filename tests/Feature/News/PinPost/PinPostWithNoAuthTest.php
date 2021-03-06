<?php

namespace Tests\Feature\News\PinPost;

use App\Post;
use Tests\WithUser;

class PinPostWithNoAuthTest extends PinPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся закрепить пост без авторизации';

    public function handle() {
        $response = $this->post($this->route, [
            'postId' => $this->post->id,
        ]);
        $response->assertStatus(302);
    }

    public function getMeasureName() {
        return 'Try to pin post with no auth';
    }
}
