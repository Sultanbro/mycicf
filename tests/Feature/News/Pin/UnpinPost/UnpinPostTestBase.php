<?php

namespace Tests\Feature\News\Pin\UnpinPost;

use App\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;

/**
 * Class UnpinPostTestBase
 * @package \Tests\Feature\News\Pin\UnpinPost
 * @covers \App\Http\Controllers\News\MyPostsController::unsetPinned
 */
abstract class UnpinPostTestBase extends FeatureTestBase {
    use WithFaker, WithUser;

    public const ISN = '1144';

    protected $postText;

    /**
     * @var Post
     */
    protected $post;

    protected function prepare() {
        $this->postText = $this->faker->text(30);

        $user = $this->getUser();
        $this->post = new Post();
        $this->post->user_isn = $user->ISN;
        $this->post->pinned = true;
        $this->post->post_text = $this->postText;
        $this->post->save();
    }

    public function getRouteName() {
        return 'news.my.unsetPinned';
    }

    protected function cleanup() {
        $this->post->forceDelete();
    }
}
