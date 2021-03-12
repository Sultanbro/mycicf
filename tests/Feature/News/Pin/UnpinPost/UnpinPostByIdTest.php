<?php

namespace Tests\Feature\News\Pin\UnpinPost;

use App\Post;

/**
 * Class UnpinPostByIdTest
 * @package Tests\Feature\News\Pin\UnpinPost
 * @covers \App\Http\Controllers\News\MyPostsController::unsetPinned
 */
class UnpinPostByIdTest extends UnpinPostTestBase {

    protected $description = 'Открепляем пост по ID';

    public function testExecute() {
        $user = $this->getUser();
        $this->actingAs($user);

        $postId = $this->post->id;
        self::assertTrue($this->post->pinned);

        $response = $this->post($this->route, [
            'postId' => $postId
        ]);
        $response->assertStatus(200);

        $post = Post::whereId($this->post->id)->first();

        self::assertNotNull($post);
        self::assertFalse($post->pinned);

    }

    public function getMeasureName() {
        return 'Unpin the post';
    }
}
