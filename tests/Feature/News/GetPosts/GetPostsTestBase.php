<?php

namespace Tests\Feature\News\GetPosts;

use App\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;

class GetPostsTestBase extends FeatureTestBase {
    use WithFaker, WithUser;

    public const ISN = '1144';
    /**
     * @var Post
     */
    private $post;

    public function getRouteName() {
        return 'news.getPosts';
    }

    protected function prepare() {
    }

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
