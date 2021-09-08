<?php

namespace Tests\Feature\News\LikePost;

use App\Like;

/**
 * Class LikePostByIdTest
 * @package Tests\Feature\News\LikePost
 * @covers \App\Http\Controllers\News\PostsController::likePost
 */
class LikePostByIdTest extends LikePostTestBase {
    protected $description = 'Лайкаем пост по ID';

    protected function prepare() {
        parent::prepare();
        $user = $this->getUser();

        Like::whereUserIsn($user->ISN)
            ->wherePostId($this->post->id)
            ->forceDelete();
    }

    public function testExecute() {
        $user = $this->getUser();
        $this->actingAs($user);

        $postId = $this->post->id;

        self::assertEquals(0,
            Like::wherePostId($postId)
                ->whereUserIsn($user->ISN)
                ->count()
        );
        $response = $this->post($this->route, [
            'postId' => $postId
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        self::assertEquals(1,
            Like::wherePostId($postId)
                ->whereUserIsn($user->ISN)
                ->count()
        );
    }

    public function getMeasureName() {
        return 'Edit the post';
    }
}
