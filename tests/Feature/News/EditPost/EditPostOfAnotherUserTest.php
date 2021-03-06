<?php

namespace Tests\Feature\News\EditPost;

use App\Post;
use Tests\WithUser;

class EditPostOfAnotherUserTest extends EditPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся удалить пост другого юзера';

    protected function prepare() {
        $this->postText = $this->faker->text(30);

        $this->post = new Post();
        $this->post->user_isn = '999911';
        $this->post->pinned = false;
        $this->post->post_text = $this->postText;
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
