<?php

namespace Tests\Feature\News\GetPosts;

use App\Like;
use App\Post;
use App\Question;
use DB;
use Illuminate\Foundation\Testing\WithFaker;
use Schema;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;

class GetPostsTestBase extends FeatureTestBase {
    use WithFaker, WithUser;

    public const ISN = '1144';
    /**
     * @var Post
     */
    protected $post;

    protected function generatePost() {
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

    public function getRouteName() {
        return 'news.getPosts';
    }

    protected function prepare() {
        $this->post = $this->generatePost();
    }

    public function cleanup() {
        Schema::disableForeignKeyConstraints();

        {
            $likes = $this->post->likes->pluck('id');
            DB::delete('DELETE FROM likes WHERE id IN (?)', $likes->toArray());

            $poll = $this->post->poll->pluck('id');
            DB::delete('DELETE FROM questions WHERE id IN (?)', $poll->toArray());

            // $post->delete();
            DB::delete('DELETE FROM posts WHERE id = ?', [$this->post->id]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
