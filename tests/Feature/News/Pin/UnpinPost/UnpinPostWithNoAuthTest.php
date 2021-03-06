<?php

namespace Tests\Feature\News\Pin\UnpinPost;

use Tests\WithUser;

/**
 * Class UnpinPostWithNoAuthTest
 * @package \Tests\Feature\News\Pin\UnpinPost
 * @covers \App\Http\Controllers\News\MyPostsController::unsetPinned
 */
class UnpinPostWithNoAuthTest extends UnpinPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся открепить пост без авторизации';

    public function testExecute() {
        $response = $this->post($this->route, [
            'postId' => $this->post->id,
        ]);
        $response->assertStatus(302);
    }

    public function getMeasureName() {
        return 'Try to unpin post with no auth';
    }
}
