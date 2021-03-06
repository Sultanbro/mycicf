<?php

namespace Tests\Feature\News\Comments\DeleteComment;

use App\Post;
use Tests\WithUser;

class DeleteCommentToPostWithNoAuthTest extends DeleteCommentTestBase {

    protected $description = 'Пытаемся добавить комментарий к посту без авторизации';

    /**
     * @var Post
     */
    protected $post;

    public function testExecute() {
        $response = $this->post($this->route, [
            'commentId' => $this->comment->id,
        ]);

        $response->assertStatus(302);
    }

    public function cleanup() {
        $this->post->forceDelete();
    }

    public function getMeasureName() {
        return 'Delete comment with no auth';
    }
}
