<?php

namespace Tests\Feature\News;

use App\Post;
use DB;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;

class GetPostsTest extends FeatureTestBase {
    use WithFaker, WithUser;

    protected $description = 'Получаем список постов';

    public const ISN = '5565';

    public function getRouteName() {
        return 'news.getPosts';
    }

    public function getMeasureName() {
        return 'Get Posts Test';
    }

    private function generatePost() {
        $post = new Post();
        $post->user_isn = self::ISN;
        $post->post_text = $this->faker->text();
        $post->pinned = true;
        $post->save();

        return $post;
    }

    public function handle() {
        $this->actingAs($this->getUser());

        $post = $this->generatePost();

        $response = $this->post($this->route);

        // $post->delete();
        DB::delete('DELETE FROM posts WHERE id = ?', [$post->id]);

        $postsResponse = collect(json_decode($response->content(), true));

        $newPost = $postsResponse->first(function ($foundPost) use ($post) {
            return $foundPost['postId'] === $post->id;
        });

        $this->assertEquals($newPost['postText'], $post->post_text);

        $response->assertStatus(200);
    }
}
