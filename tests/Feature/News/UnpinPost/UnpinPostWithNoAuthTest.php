<?php

namespace Tests\Feature\News\UnpinPost;

use App\Post;
use Tests\WithUser;

class UnpinPostWithNoAuthTest extends UnpinPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся закрепит пост без авторизации';

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
