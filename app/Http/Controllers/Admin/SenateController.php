<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Events\NewPost;
use App\Http\Controllers\Controller;
use App\Post;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SenateController extends Controller
{
    public function newPost(){
        return view('senate.post.new');
    }

    public function savePostData(Request $request){
        $success = true;
        $errorText = "";
        $isPoll = (boolean)$request->poll;
        $postText = $request->postText;
        if($isPoll){
            $question = $request->question;
            $answers = $request->answers;
        }
        DB::beginTransaction();
        try{
            $post = new Post();
            $post->user_isn = User::SENATE_ISN;
            $post->post_text = $postText;
            $post->pinned = 0;
            $post->save();
            if($isPoll){
                $poll = new Question();
                $poll->question = $question;
                $poll->post_id = $post->id;
                $poll->save();
                foreach ($answers as $answer){
                    $answersModel = new Answer();
                    $answersModel->value = $answer;
                    $answersModel->question_id = $poll->id;
                    $answersModel->save();
                }
            }
        }catch (\Exception $ex){
            DB::rollBack();
            $success = false;
            $errorText = $ex->getMessage();
            return response()
                ->json([
                    'success' => $success,
                    'errorText' => $errorText
                ]);
        }
        DB::commit();
        $response = [
            'date' => date("d.m.Y H:i", strtotime($post->created_at)),
            'edited' => false,
            'fullname' => "Сенат",
            'isLiked' => 0,
            'isn' => $post->user_isn,
            'userISN' => $post->user_isn,
            'likes' => 0,
            'pinned' => 0,
            'postText' => $post->getText(),
            'postId' => $post->id,
            'image' => $post->getImage(),
            'documents' => $post->getDocuments(),
            'youtube' => $post->getVideo(),
            'comments' => [],
        ];
        broadcast(new NewPost([
            'post' => $response,
            'type' => Post::NEW_POST
        ]));
        return response()
            ->json([
                'success' => $success,
                'errorText' => $errorText
            ]);
    }
}
