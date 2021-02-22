<?php

namespace Tests\Feature\News;

use App\Post;
use DB;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\WithUser;

class GetPostsTest extends TestCase {
    use WithFaker, WithUser;

    private $route;

    public const ISN = '5565';

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $this->route = route('news.getPosts');
    }

    private function generatePost() {
        $post = new Post();
        $post->user_isn = self::ISN;
        $post->post_text = $this->faker->text();
        $post->pinned = true;
        $post->save();

        return $post;
    }

    public function testBasic() {
        $this->actingAs($this->getUser());

        $post = $this->generatePost();

        $response = $this->post($this->route);

        // $post->delete();
        DB::delete('DELETE FROM posts WHERE id = ?', [$post->id]);

        $postsResponse = collect(json_decode($response->content()));

        $newPost = $postsResponse->first(function ($foundPost) use ($post) {
            return $foundPost->postId === $post->id;
        });

        $this->assertEquals($newPost->postText, $post->post_text);

        $response->assertStatus(200);
    }
}
