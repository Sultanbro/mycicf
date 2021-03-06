<?php

namespace Tests\Feature\News\DeletePost;

use App\Post;
use Tests\WithUser;

class EditPostOfAnotherUserTest extends DeletePostTestBase {
    use WithUser;

    protected $description = 'Пытаемся удалить пост другого юзера';

    /**
     * @var Post
     */
    private $post;

    protected function prepare() {
        $this->post = new Post();
        $this->post->user_isn = '99991';
        $this->post->pinned = false;
        $this->post->post_text = $this->faker->text(30);
        $this->post->save();
    }

    public function handle() {
        $user = $this->getUser();
        $this->actingAs($user);

        self::assertTrue(Post::whereId($this->post->id)->exists());
        $response = $this->post($this->route, [
            'postId' => $this->post->id,
        ]);
        $response->assertStatus(403);
        self::assertTrue(Post::whereId($this->post->id)->exists());
    }

    protected function cleanup() {
        $this->post->forceDelete();
    }

    public function getMeasureName() {
        return 'Add post with minimal set of data';
    }
}
