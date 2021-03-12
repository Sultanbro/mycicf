<?php

namespace Tests\Feature\News\LikePost;

use App\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;

abstract class LikePostTestBase extends FeatureTestBase {
    use WithFaker, WithUser;

    public const ISN = '1144';

    /**
     * @var Post
     */
    protected $post;

    protected function prepare() {
        $user = $this->getUser();
        $this->post = new Post();
        $this->post->user_isn = $user->ISN;
        $this->post->pinned = false;
        $this->post->post_text = $this->faker->text(30);
        $this->post->save();
    }

    public function getRouteName() {
        return 'news.likePost';
    }

    protected function cleanup() {
        $this->post->forceDelete();
    }
}
