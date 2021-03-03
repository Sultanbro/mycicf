<?php

namespace Tests\Feature\News\AddComment;

use App\Post;
use Tests\WithUser;

class AddCommentToPostTest extends AddCommentTestBase {
    use WithUser;

    protected $description = 'Добавляем комментарий к посту';

    /**
     * @var Post
     */
    protected $post;

    /**
     * @var int
     */
    protected $createdCommentId;

    public function prepare() {
        $this->post = new Post();
        $this->post->user_isn = self::ISN;
        $this->post->post_text = 'text';
        $this->post->pinned = false;
        $this->post->save();
    }

    public function handle() {
        $this->actingAs($this->getUser());
        $commentText = 'Hello';
        $response = $this->post($this->route, [
            'postId' => $this->post->id,
            'commentText' => $commentText,
            'isn' => self::ISN,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'userISN' => self::ISN,
            'commentText' => $commentText,
            'postId' => $this->post->id,
        ]);

        $this->createdCommentId = $response->json('commentId');
    }

    public function cleanup() {
        \DB::delete('DELETE FROM comments WHERE id = ?', [$this->createdCommentId]);
        $this->post->delete();
    }

    public function getMeasureName() {
        return 'Add comment to post';
    }
}
