<?php

namespace Tests\Feature\News\Pin\PinPost;

use App\Post;
use Tests\WithUser;

/**
 * Class PinPostTestBase
 * @package \Tests\Feature\News\Pin\UnpinPost
 * @covers \App\Http\Controllers\News\MyPostsController::setPinned
 */
class PinPostWithNoAuthTest extends PinPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся закрепить пост без авторизации';

    public function testExecute() {
        $response = $this->post($this->route, [
            'postId' => $this->post->id,
        ]);
        $response->assertStatus(302);
    }

    public function getMeasureName() {
        return 'Try to pin post with no auth';
    }
}
