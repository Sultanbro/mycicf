<?php

namespace App\Http\Controllers\News\Comments;

use App\Answer;
use App\Comment;
use App\Events\NewPost;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\AddPostRequest;
use App\Http\Requests\News\NewsGetPostsRequest;
use App\Library\Services\PostsService;
use App\Like;
use App\Post;
use App\Question;
use App\UserAnswer;
use Debugbar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PostCommentsController extends Controller
{
    /**
     * @var PostsService
     */
    private $postsService;

    public function __construct(PostsService $postsService)
    {
        $this->postsService = $postsService;
    }

    public function addComment(Request $request) {
        $postId = $request->postId;
        $new_comment = new Comment();
        $new_comment->text = $request->commentText;
        $new_comment->post_id = $postId;
        $new_comment->user_isn = $request->isn;
        $new_comment->save();

        $response = [
            'userISN' => $new_comment->user_isn,
            'commentText' => $new_comment->text,
            'postId' => $new_comment->post_id,
            'commentId' => $new_comment->id,
            'date' => date("d.m.Y H:i", strtotime($new_comment->created_at)),
            'fullname' => Auth::user()->full_name,
        ];

        $this->postsService->forget($postId);

        return $response;
    }

    public function deleteComment(Request $request) {
        $commentId = $request->commentId;

        $comment = Comment::find($commentId);

        Comment::where('id', $commentId)->delete();

        $response = [
            'success' => true,
        ];

        $this->postsService->forget($comment->post_id);

        return $response;
    }

    public function editComment(Request $request) {
        $success = false;

        $comment_id = $request->commentId;
        $comment_text = $request->commentText;

        Comment::where('id', $comment_id)
            ->update([
                'text' => $comment_text,
            ]);
        $response = [
            'success' => !$success,
            'edited' => true,
        ];
        //TODO настроить сокеты
//        broadcast(new NewPost([
//            'post' => [
//                'text' => $comment_text,
//                'id' => $comment_id,
//            ],
//            'type' => Post::EDITED_COMMENT
//        ]));

        // cache()->clear();

        return $response;
    }
}
