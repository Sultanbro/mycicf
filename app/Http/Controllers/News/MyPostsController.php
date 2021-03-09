<?php

namespace App\Http\Controllers\News;

use App\Events\NewPost;
use App\Http\Controllers\Controller;
use App\Library\Services\PostsService;
use App\Post;
use Exception;
use Illuminate\Http\Request;

class MyPostsController extends Controller
{
    /**
     * @var PostsService
     */
    private $postsService;

    public function __construct(PostsService $postsService)
    {
        $this->postsService = $postsService;
    }

    /**
     *
     * @uses CheckPostAccess middleware
     * @param Request $request
     * @return bool[]
     * @throws Exception
     */
    public function deletePost(Request $request) {
        $postId = $request->postEntity->id;

        Post::where('id', $postId)->delete();

        broadcast(new NewPost([
            'post' => [
                'id' => $postId,
            ],
            'type' => Post::DELETED_POST
        ]));
        $this->postsService->forget($postId);

        return [
            'success' => true,
        ];
    }

    /**
     * @uses CheckPostAccess middleware
     * @param Request $request
     * @throws Exception
     */
    public function setPinned(Request $request) {
        $id = $request->postId;
        $post = Post::findOrFail($id);

        broadcast(new NewPost([
            'post' => [
                'id' => $id,
                'pinned' => 1
            ],
            'type' => Post::PINNED_POST
        ]));
        $post->setPinned();

        $this->postsService->forget($id);

    }

    /**
     * @uses CheckPostAccess middleware
     * @param Request $request
     * @return string
     */
    public function unsetPinned(Request $request){
        Post::where('pinned', 1)->update(['pinned' => 0]);
        broadcast(new NewPost([
            'post' => [
                'id' => 0,
                'pinned' => -1
            ],
            'type' => Post::PINNED_POST
        ]));

        // cache()->flush();

        return 'true';
    }

    /**
     * @uses CheckPostAccess middleware
     * @param Request $request
     * @return bool[]
     * @throws Exception
     */
    public function editPost(Request $request) {
        $success = false;
        $post_id = $request->postId;
        $post_text = $request->postText;

        $model = Post::where('id', $post_id)
                ->update([
                    'post_text' => $post_text,
                ]);
        $response = [
            'success' => !$success,
            'edited' => true,
        ];

        broadcast(new NewPost([
            'post' => [
                'text' => $post_text,
                'id' => $post_id,
            ],
            'type' => Post::EDITED_POST
        ]));

        cache()->clear();
        // $this->postsService->forget($post_id);

        return $response;
    }
}
