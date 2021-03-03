<?php

namespace Tests\Feature\News\DeletePost;

use App\Post;
use Tests\WithUser;

class DeletePostByIdTest extends DeletePostTestBase {
    use WithUser;

    protected $description = 'Удаляем пост по ID';

    /**
     * @var Post
     */
    private $post;

    protected function prepare() {
        $user = $this->getUser();
        $this->post = new Post();
        $this->post->user_isn = $user->ISN;
        $this->post->pinned = false;
        $this->post->post_text = $this->faker->text(30);
        $this->post->save();
    }

    public function handle() {
        $user = $this->getUser();
        $this->actingAs($user);

        $this->assertEquals(1, Post::whereId($this->post->id)->count());
        $response = $this->post($this->route, [
            'postId' => $this->post->id,
        ]);
        $response->assertStatus(200);
        $this->assertEquals(0, Post::whereId($this->post->id)->count());
    }

    public function getMeasureName() {
        return 'Add post with minimal set of data';
    }
}
