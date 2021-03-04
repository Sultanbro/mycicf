<?php

namespace Tests\Feature\News\AddComment;

use App\Comment;
use App\Post;
use Tests\WithUser;

class AddCommentToPostWithNoAuthTest extends AddCommentTestBase {
    use WithUser;

    protected $description = 'Пытаемся добавить комментарий к посту без авторизации';

    /**
     * @var Post
     */
    protected $post;

    public function prepare() {
        $this->post = new Post();
        $this->post->user_isn = self::ISN;
        $this->post->post_text = 'text';
        $this->post->pinned = false;
        $this->post->save();
    }

    public function handle() {
        $commentText = 'Hello';
        $commentsCount = Comment::count();
        $response = $this->post($this->route, [
            'postId' => $this->post->id,
            'commentText' => $commentText,
            'isn' => self::ISN,
        ]);

        $response->assertStatus(302);

        self::assertEquals($commentsCount, Comment::count());
    }

    public function cleanup() {
        $this->post->delete();
    }

    public function getMeasureName() {
        return 'Add comment to post';
    }
}
