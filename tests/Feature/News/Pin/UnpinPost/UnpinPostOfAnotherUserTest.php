<?php

namespace Tests\Feature\News\Pin\UnpinPost;

use App\Post;
use Tests\WithUser;

/**
 * Class UnpinPostOfAnotherUserTest
 * @package \Tests\Feature\News\Pin\UnpinPost
 * @covers \App\Http\Controllers\News\MyPostsController::unsetPinned
 */
class UnpinPostOfAnotherUserTest extends UnpinPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся открепить пост другого юзера';

    protected function prepare() {
        $this->post = new Post();
        $this->post->user_isn = '99991111';
        $this->post->pinned = false;
        $this->post->post_text = $this->faker->text(50);
        $this->post->save();
    }

    public function testExecute() {
        $user = $this->getUser();
        $this->actingAs($user);

        self::assertTrue(Post::whereId($this->post->id)->exists());
        $response = $this->post($this->route, [
            'postId' => $this->post->id,
        ]);
        $response->assertStatus(403);
        self::assertTrue(Post::whereId($this->post->id)->exists());
    }

    public function getMeasureName() {
        return 'Try to unpin the post of another user';
    }
}
