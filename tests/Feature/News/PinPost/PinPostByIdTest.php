<?php

namespace Tests\Feature\News\PinPost;

use App\Post;

class PinPostByIdTest extends PinPostTestBase {

    protected $description = 'Закрепляем пост по ID';

    public function handle() {
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
