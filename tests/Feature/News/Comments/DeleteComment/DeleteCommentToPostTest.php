<?php

namespace Tests\Feature\News\Comments\DeleteComment;

use App\Comment;
use App\Post;
use Tests\WithUser;

class DeleteCommentToPostTest extends DeleteCommentTestBase {
    use WithUser;

    protected $description = 'Добавляем комментарий к посту';

    public function testExecute() {
        $this->actingAs($this->getUser());
        $response = $this->post($this->route, [
            'commentId' => $this->comment->id,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
    }

    public function getMeasureName() {
        return 'Delete comment';
    }
}
