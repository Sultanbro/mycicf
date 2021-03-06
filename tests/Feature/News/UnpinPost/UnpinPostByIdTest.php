<?php

namespace Tests\Feature\News\UnpinPost;

use App\Post;

class UnpinPostByIdTest extends UnpinPostTestBase {

    protected $description = 'Закрепляем пост по ID';

    public function handle() {
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
