<?php

namespace Tests\Feature\News\Comments\DeleteComment;

use App\Comment;
use App\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;

abstract class DeleteCommentTestBase extends FeatureTestBase {
    use WithFaker;

    public const ISN = '1144';

    /**
     * @var Post
     */
    protected $post;

    /**
     * @var Comment
     */
    protected $comment;

    public function prepare() {
        $this->post = new Post();
        $this->post->user_isn = self::ISN;
        $this->post->post_text = 'text';
        $this->post->pinned = false;
        $this->post->save();

        $this->comment = new Comment();
        $this->comment->text = $this->faker->text(10);
        $this->comment->user_isn = self::ISN;
        $this->comment->post_id = $this->post->id;
        $this->comment->answered_user_isn = 0;
        $this->comment->save();
    }

    public function getRouteName() {
        return 'news.comments.delete';
    }

    public function cleanup() {
        $commentId = $this->comment->id;
        $this->comment->forceDelete();

        $this->assertFalse(Comment::whereId($commentId)->exists());

        $postId = $this->post->id;
        $this->post->forceDelete();

        $this->assertFalse(Post::whereId($postId)->exists());

    }
}
