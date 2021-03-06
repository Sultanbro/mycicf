<?php

namespace Tests\Feature\News\UnpinPost;

use App\Post;
use Tests\WithUser;

class UnpinPostOfAnotherUserTest extends UnpinPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся удалить пост другого юзера';

    protected function prepare() {
        $this->post = new Post();
        $this->post->user_isn = '99991111';
        $this->post->pinned = false;
        $this->post->post_text = $this->faker->text(50);
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

    public function getMeasureName() {
        return 'Add post with minimal set of data';
    }
}
