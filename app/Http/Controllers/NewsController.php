<?php

namespace App\Http\Controllers;

use App\Centcoin;
use App\CentcoinHistory;
use App\Comment;
use App\Events\NewPost;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function addPost(Request $request) {

//        $success = false;
//        $error = '';
//
//        if(!Auth::check()) {
//            $error = 'Пожалуста авторизуйтесь заново';
//            $success = false;
//            return [
//                'error' => $error,
//                'success' => $success
//            ];
//        }

//        try {
            $new_post = new Post();
            $new_post->user_isn = $request->isn;
            $new_post->post_text = $request->postText;
            $new_post->pinned = 0;
            $new_post->save();
//        }
//        catch(Exception $e) {
//            $error = $e->getMessage();
//            $success = false;
//            return [
//                'success' => $success,
//                'error' => $error
//            ];
//        }

        $full_name = Auth::user()->full_name;

        $response = [
            'userISN' => $new_post->user_isn,
            'postText' => $new_post->post_text,
//            'likes' => $newPost->likes,
            'pinned' => $new_post->pinned,
            'fullname' => $full_name,
            'id' => $new_post->id,
            'date' => date("d.m.Y H:i", strtotime($new_post->created_at)),
        ];

//        $result = [
//            'success' => $success,
//            'error' => $error,
//            'post' => $response,
//        ];
        broadcast(new NewPost($response));
        return $response;
    }

    public function getPosts(Request $request) {
        $response = [];
        $last_index = $request->lastIndex;

        if($last_index == null){
            $model = Post::orderBy('id', 'DESC')
                ->limit(5)
                ->get();
        }
        else {
            $model = Post::orderBy('id', 'DESC')
                ->where('id', '<', $last_index)
                ->limit(5)
                ->get();
        }

        foreach ($model as $item) {
            array_push($response, [
                'fullname' => (new User())->getFullName($item->user_isn),
                'postText' => $item->post_text,
                'pinned' => $item->pinned,
                'postId' => $item->id,
                'likes' => (new Like())->getLikes($item->id),
                'isLiked' => (new Like())->getIsLiked($item->id, Auth::user()->ISN),
//                'comments' => (new Comment())->getComment($item->id),
                'date' => date('d.m.Y H:i', strtotime($item->created_at))
            ]);
        }

//        $result = [
//            'success' => $success,
//            'error' => $error,
//            'post' => $response
//        ];

        return $response;
    }

    public function deletePost(Request $request) {
        $delete_post = Post::where('id', $request->postId)->delete();
        $success = 'true';
        return $success;
    }

    public function setPinned(Request $request){
        $id = $request->postId;
        $post = Post::findOrFail($id);
        $post->setPinned();
    }

    public function unsetPinned(Request $request){
        Post::where('pinned', 1)->update(['pinned' => 0]);
        return 'true';
    }

    public function likePost(Request $request) {
        $post_id = $request->postId;
        $user_isn = $request->isn;

        $model = Like::where('post_id', $post_id)
            ->where('user_isn', $user_isn);

        if(sizeof($model->get()) === 0) {
            $like = new Like();
            $like->user_isn = $user_isn;
            $like->post_id = $post_id;
            $like->save();
            $success = true;
        }
        else {
            $model->delete();
            $success = false;
        }

        $response = [
          'success' => $success,
        ];

        return $response;
    }

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
        ];

        return $response;
    }

    public function getView() {
        return view('news');
    }
}
