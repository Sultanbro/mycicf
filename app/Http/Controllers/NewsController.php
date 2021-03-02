<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Centcoin;
use App\CentcoinHistory;
use App\Comment;
use App\Events\NewPost;
use App\Library\Services\KiasServiceInterface;
use App\Like;
use App\Mail\Email;
use App\Post;
use App\Question;
use App\Score;
use App\User;
use App\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function addPost(Request $request) {
        $isPoll = (boolean)$request->poll;
        if($isPoll) {
            $question = $request->question;
            $answers = $request->answers;
        }
        DB::beginTransaction();

        if(!Auth::check()) {
            $error = 'Пожалуста авторизуйтесь заново';
            $success = false;
            return [
                'error' => $error,
                'success' => $success
            ];
        }

        if($request->postText === null && isset($request->postFiles) && sizeof($request->postFiles) === 0 && isset($request->postVideos) && sizeof($request->postVideos) === 0 && isset($request->postDocuments) && sizeof($request->postDocuments) === 0){
            $error = 'Заполните поле или добавьте вложения';
            $success = false;
            return [
                'error' => $error,
                'success' => $success
            ];
        }

        try {
            ini_set("upload_max_filesize","50M");
            $new_post = new Post();
            $new_post->user_isn = $request->isn;
            $new_post->post_text = $request->postText;
            $new_post->pinned = 0;
            $new_post->save();
            if(isset($request->postFiles)) {
                foreach ($request->postFiles as $file) {
                    $fileName = $file->getClientOriginalName();
                    $content = file_get_contents($file->getRealPath());
                    Storage::disk('local')->put("public/post_files/$new_post->id/images/$fileName", $content);
                }
            }
            if(isset($request->postDocuments)) {
                foreach($request->postDocuments as $file) {
                    $fileName = $file->getClientOriginalName();
                    $content = file_get_contents($file->getRealPath());
                    Storage::disk('local')->put("public/post_files/$new_post->id/documents/$fileName", $content);
                }
            }
            if(isset($request->postVideos)) {
                foreach ($request->postVideos as $file) {
                    $fileName = $file->getClientOriginalName();
                    $content = file_get_contents($file->getRealPath());
                    Storage::disk('local')->put("public/post_files/$new_post->id/videos/$fileName", $content);
                }
            }
            if($isPoll) {
                $poll = new Question();
                $poll->question = $question;
                $poll->post_id = $new_post->id;
                $poll->save();
                $post_poll = [];
                $post_answers = [];
                foreach ($answers as $answer) {
                    $answersModel = new Answer();
                    $answersModel->value = $answer;
                    $answersModel->question_id = $poll->id;
                    $answersModel->save();
                    array_push($post_answers, [
                        "answer_id" => $answersModel->id,
                        "answer_title" => $answersModel->value = $answer,
                        "answer_votes" => 0,
                    ]);
                    $post_poll = [
                        "question_id" => $poll->id,
                        "question_title" => $poll->question = $question,
                        "total_votes" => 0,
                        "answers" => $post_answers,
                    ];
                }
            }
        } catch(\Exception $e) {
            DB::rollBack();
            $error = $e->getMessage();
            $success = false;
            return [
                'success' => $success,
                'error' => $error
            ];
        }
        DB::commit();
        $response = [
            'date' => date("d.m.Y H:i", strtotime($new_post->created_at)),
            'edited' => false,
            'fullname' => Auth::user()->full_name,
            'isLiked' => 0,
            'isn' => $new_post->user_isn,
            'userISN' => $new_post->user_isn,
            'likes' => 0,
            'pinned' => 0,
            'postText' => $new_post->getText(),
            'postId' => $new_post->id,
            'image' => $new_post->getImage(),
            'documents' => $new_post->getDocuments(),
            'youtube' => $new_post->getVideo(),
            'videos' => $new_post->getVideoUrl(),
            'comments' => [],
            "post_poll" => isset($post_poll) ? $post_poll !=0 : $post_poll,
            "isVoted" => 0,
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
                'date' => date('d.m.Y H:i', strtotime($item->created_at)),
                'userISN' => $item->user_isn,
                'comments' => $item->getComments(),
                'image' => $item->getImage(),
                'documents' => $item->getDocuments(),
                'youtube' => $item->getVideo(),
                'videos' => $item->getVideoUrl(),
                'post_poll' => $item->getPoll($item->id),
                'isVoted' => $item->getIsVoted(Auth::user()->ISN, $item->id),
                'score_likes' => Score::where('user_isn', $item->user_isn)->where('type','like')->get()->count()
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
        Post::where('id', $request->postId)->delete();


        broadcast(new NewPost([
            'post' => [
                'id' => $request->postId,
            ],
            'type' => Post::DELETED_POST
        ]));
        return [
            'success' => true,
        ];
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

    public function addComment(Request $request) {
        $new_comment = new Comment();
        $new_comment->text = $request->commentText;
        $new_comment->post_id = $request->postId;
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

        return $response;

    }

    public function deleteComment(Request $request) {
        Comment::where('id', $request->commentId)->delete();

        $response = [
            'success' => true,
        ];

        return $response;
    }

    public function birthday()
    {
        return view('news-birthday');
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

        return $response;
    }

    public function vote(Request $request) {
        $post_id = $request->postId;
        $user_isn = $request->isn;
        $question_id = $request->questionId;
        $answer_id = $request->answerId;

        $model = UserAnswer::where('question_id', $question_id)
            ->where('answer_id', $answer_id)
            ->where('user_isn', $user_isn);

        if(sizeof($model->get()) === 0) {
            $vote = new UserAnswer();
            $vote->user_isn = $user_isn;
            $vote->question_id = $question_id;
            $vote->answer_id = $answer_id;
            $vote->save();
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

    public function getView() {
        return view('news');
    }

    public function senateVote(Request $request){
        $answers = $request->answers;
        foreach ($answers as $answer){
            if($answer['checked']){
                $userAnswer = new UserAnswer();
                $userAnswer->question_id = $request->question;
                $userAnswer->answer_id = $answer['answer_id'];
                $userAnswer->user_isn = auth()->user()->ISN;
                $userAnswer->save();
            }
        }
        return response()->json([
            'success' => true
        ]);
    }

    public function dev(Request $request) {
        switch ($request->name) {
            case 'boss':
                return view('dev')->with([
                   'type' => 'boss'
                ]);
            case 'company':
                return view('dev')->with([
                    'type' => 'company'
                ]);
            case 'rating':
                return view('dev')->with([
                    'type' => 'rating'
                ]);
            case 'results':
                return view('dev')->with([
                    'type' => 'results'
                ]);
            case 'study':
                return view('dev')->with([
                    'type' => 'study'
                ]);
            default:
                return 0;
        }
    }

    public function index(Request $request) {
        return view('boss-says');
    }

    public function getBossPosts(Request $request) {
        $response = [];
        $last_index = $request->lastIndex;

        if($last_index == null){
            $model = Post::orderBy('id', 'DESC')
                ->where('user_isn', 1472004)
                ->limit(5)
                ->get();
        }
        else {
            $model = Post::orderBy('id', 'DESC')
                ->where('id', '<', $last_index)
                ->where('user_isn', 1472004)
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
                'date' => date('d.m.Y H:i', strtotime($item->created_at)),
                'userISN' => $item->user_isn,
                'comments' => $item->getComments(),
                'image' => $item->getImage(),
                'documents' => $item->getDocuments(),
                'youtube' => $item->getVideo(),
                'videos' => $item->getVideoUrl(),
                'post_poll' => $item->getPoll($item->id),
                'isVoted' => $item->getIsVoted(Auth::user()->ISN, $item->id),
            ]);
        }

        return $response;
    }
}
