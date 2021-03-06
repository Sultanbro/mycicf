<?php

namespace Tests\Feature\News\GetPosts;

use App\Post;

class GetPostsTest extends GetPostsTestBase {
    protected $description = 'Получаем список постов';

    public const ISN = '1144';

    public function testExecute() {
        $this->actingAs($this->getUser());

        $response = $this->post($this->route);

        $response->assertStatus(200);

        $postsResponse = collect(json_decode($response->content(), true));

        $newPost = $postsResponse->first(function ($foundPost) {
            return $foundPost['postId'] === $this->post->id;
        });

        $this->assertEquals($newPost['postText'], $this->post->post_text);

        $response->assertStatus(200);
    }
}
