<?php

namespace Tests\Feature\News\Pin\PinPost;

use App\Post;

/**
 * Class PinPostTestBase
 * @package \Tests\Feature\News\Pin\UnpinPost
 * @covers \App\Http\Controllers\News\MyPostsController::setPinned
 */
class PinPostByIdTest extends PinPostTestBase {

    protected $description = 'Закрепляем пост по ID';

    public function testExecute() {
        $user = $this->getUser();
        $this->actingAs($user);

        $postId = $this->post->id;
        self::assertFalse($this->post->pinned);

        $response = $this->post($this->route, [
            'postId' => $postId
        ]);
        $response->assertStatus(200);

        $post = Post::whereId($this->post->id)->first();

        self::assertNotNull($post);
        self::assertTrue($post->pinned);
    }

    public function getMeasureName() {
        return 'Edit the post';
    }
}
