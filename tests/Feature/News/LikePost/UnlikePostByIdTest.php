<?php

namespace Tests\Feature\News\LikePost;

use App\Like;
use App\Post;

class UnlikePostByIdTest extends LikePostTestBase {
    protected $description = 'Лайкаем пост по ID';

    /**
     * @var Like
     */
    private $like;

    protected function prepare() {
        parent::prepare();
        $user = $this->getUser();

        $this->like = new Like();
        $this->like->post_id = $this->post->id;
        $this->like->user_isn = $user->ISN;
        $this->like->save();
    }

    public function testExecute() {
        $user = $this->getUser();
        $this->actingAs($user);

        $postId = $this->post->id;

        self::assertEquals(1, Like::wherePostId($postId)->whereUserIsn($user->ISN)->count());
        $response = $this->post($this->route, [
            'postId' => $postId
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => false,
        ]);

        self::assertEquals(0, Like::wherePostId($postId)->whereUserIsn($user->ISN)->count());
    }

    public function getMeasureName() {
        return 'Edit the post';
    }
}
