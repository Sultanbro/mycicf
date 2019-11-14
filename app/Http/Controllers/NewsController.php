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
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function addPost(Request $request) {
        $success = false;
        $error = '';

        if(!Auth::check()) {
            $error = 'Пожалуста авторизуйтесь заново';
            $success = false;
            return [
                'error' => $error,
                'success' => $success
            ];
        }

        if($request->postText === null && sizeof($request->postFiles) === 0){
            $error = 'Заполните поле или добавьте фотографию';
            $success = false;
            return [
                'error' => $error,
                'success' => $success
            ];
        }

        try {
            $new_post = new Post();
            $new_post->user_isn = $request->isn;
            $new_post->post_text = $request->postText;
            $new_post->pinned = 0;
            $new_post->save();
            if(isset($request->postFiles)) {
                foreach ($request->postFiles as $file) {
                    $fileName = $file->getClientOriginalName();
                    $content = file_get_contents($file->getRealPath());
                    Storage::disk('local')->put("public/post_files/$new_post->id/$fileName", $content);
                }
            }
        }catch(\Exception $e) {
            $error = $e->getMessage();
            $success = false;
            return [
                'success' => $success,
                'error' => $error
            ];
        }

        $full_name = Auth::user()->full_name;

        $response = [
            'date' => date("d.m.Y H:i", strtotime($new_post->created_at)),
            'edited' => false,
            'fullname' => $full_name,
            'isLiked' => 0,
            'isn' => $new_post->user_isn,
            'userISN' => $new_post->user_isn,
            'likes' => 0,
            'pinned' => 0,
            'postText' => $new_post->getText(),
            'postId' => $new_post->id,
            'image' => $new_post->getImage(),
            'youtube' => $new_post->getVideo(),
        ];

        $result = [
            'success' => $success,
            'error' => $error,
            'post' => $response,
        ];
        broadcast(new NewPost([
            'post' => $response,
            'type' => Post::NEW_POST
        ]));
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
                'isn' => $item->user_isn,
                'fullname' => (new User())->getFullName($item->user_isn),
                'postText' => $item->getText(),
                'pinned' => $item->pinned,
                'postId' => $item->id,
                'edited' => (new Post())->getIsEdited($item->id),
                'likes' => (new Like())->getLikes($item->id),
                'isLiked' => (new Like())->getIsLiked($item->id, Auth::user()->ISN),
//                'comments' => (new Comment())->getComment($item->id),
                'date' => date('d.m.Y H:i', strtotime($item->created_at)),
                'userISN' => $item->user_isn,
                'image' => $item->getImage(),
                'youtube' => $item->getVideo(),

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

        broadcast(new NewPost([
            'post' => [
                'id' => $request->postId,
            ],
            'type' => Post::DELETED_POST
        ]));
        return $success;
    }

    public function setPinned(Request $request){
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
    }

    public function unsetPinned(Request $request){
        Post::where('pinned', 1)->update(['pinned' => 0]);
        broadcast(new NewPost([
            'post' => [
                'id' => 0,
                'pinned' => -1
            ],
            'type' => Post::PINNED_POST
        ]));
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

        broadcast(new NewPost([
            'post' => [
                'id' => $post_id,
                'likes' => (new Like())->getLikes($post_id),
            ],
            'type' => Post::LIKED_POST
        ]));

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
            'edited' => true,
        ];

        broadcast(new NewPost([
            'post' => [
                'text' => $post_text,
                'id' => $post_id,
            ],
            'type' => Post::EDITED_POST
        ]));

        return $response;
    }

    public function getView() {
        return view('news');
    }
}
