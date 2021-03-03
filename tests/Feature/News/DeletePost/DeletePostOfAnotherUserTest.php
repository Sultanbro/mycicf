<?php

namespace Tests\Feature\News\DeletePost;

use App\Post;
use Tests\WithUser;

class DeletePostOfAnotherUserTest extends DeletePostTestBase {
    use WithUser;

    protected $description = 'Пытаемся удалить пост другого юзера';

    public function handle() {
        $user = $this->getUser();
        $this->actingAs($user);

        $post = new Post();
        $post->user_isn = '99991';
        $post->pinned = false;
        $post->post_text = $this->faker->text(30);
        $post->save();

        $this->assertEquals(1, Post::whereId($post->id)->count());
        $response = $this->post($this->route, [
            'postId' => $post->id,
        ]);
        $response->assertStatus(403);
        $this->assertEquals(1, Post::whereId($post->id)->count());
    }

    public function getMeasureName() {
        return 'Add post with minimal set of data';
    }
}
