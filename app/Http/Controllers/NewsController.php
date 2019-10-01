<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function addPost(Request $request){

        $success = true;

        $newPost = new Post();
        $newPost->user_isn = $request->isn;
        $newPost->post_text = $request->postText;
        $newPost->likes = 0;
        $newPost->pinned = 0;
        $newPost->save();

        $fullname = Auth::user()->full_name;

        $response = [
            'user_isn' => $newPost->user_isn,
            'postText' => $newPost->post_text,
            'likes' => $newPost->likes,
            'pinned' => $newPost->pinned,
            'success' => $success,
            'fullname' => $fullname,
            'id' => $newPost->id,
            'date' => date("d.m.Y h:m", strtotime($newPost->created_at)),
        ];

        return $response;
    }

    public function getPosts(Request $request){
        $result = [];
        $lastIndex = $request->lastIndex;
        if($lastIndex == null){
            $model = Post::orderBy('id', 'DESC')
                ->limit(5)
                ->get();
        }
        else {
            $model = Post::orderBy('id', 'DESC')
                ->where('id', '<', $lastIndex)
                ->limit(5)
                ->get();
        }

        foreach ($model as $item){
            array_push($result, [
                'fullname' => (new User())->getFullName($item->user_isn),
                'postText' => $item->post_text,
                'likes' => $item->likes,
                'pinned' => $item->pinned,
                'postId' => $item->id,
                'likes' => (new Like())->getLikes($item->id),
                'isLiked' => (new Like())->getIsLiked($item->id, Auth::user()->ISN),
//                'comments' => (new Comment())->getComment($item->id),
                'date' => date('d.m.Y h:m', strtotime($item->created_at))
            ]);
        }
        return $result;
    }

    public function deletePost(Request $request) {
        $success = 'true';
        $delete_post = Post::where('id', $request->postId)->delete();
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
        $postId = $request->postId;
        $user_isn = $request->isn;

        $model = Like::where('postId' , $postId)
            ->where('user_isn', $user_isn);

        if(sizeof($model->get()) === 0) {
            $like = new Like();
            $like->user_isn = $user_isn;
            $like->postId = $postId;
            $like->save();
            $success = 1;
        }
        else {
            $model->delete();
            $success = 0;
        }

        $response = [
          'success' => $success,
        ];

        return $response;
    }

    public function editPost(Request $request) {
        $postId = $request->postId;
        $postText = $request->postText;

        $model = Post::where('id', $postId)
                ->update([
                    'post_text' => $postText,
                ]);
        return 'success';
    }

    public function getView() {
        return view('news');
    }

}
