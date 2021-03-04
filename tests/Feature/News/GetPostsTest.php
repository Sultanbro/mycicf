<?php

namespace Tests\Feature\News;

use App\Like;
use App\Post;
use App\Question;
use DB;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;

class GetPostsTest extends FeatureTestBase {
    use WithFaker, WithUser;

    protected $description = 'Получаем список постов';

    public const ISN = '1144';
    /**
     * @var Post
     */
    private $post;

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

        $like = new Like();
        $like->user_isn = $this->getUser()->ISN;
        $like->post_id = $post->id;
        $like->save();

        $like = new Like();
        $like->user_isn = '99991';
        $like->post_id = $post->id;
        $like->save();

        $question = new Question();
        $question->post_id = $post->id;
        $question->question = 'Question!';
        $question->save();

        return $post;
    }

    protected function prepare() {
        $this->post = $this->generatePost();
    }

    public function handle() {
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

    public function cleanup() {
        $likes = $this->post->likes->pluck('id');
        DB::delete('DELETE FROM likes WHERE id IN (?)', $likes->toArray());

        $poll = $this->post->poll->pluck('id');
        DB::delete('DELETE FROM questions WHERE id IN (?)', $poll->toArray());

        // $post->delete();
        DB::delete('DELETE FROM posts WHERE id = ?', [$this->post->id]);

    }
}
