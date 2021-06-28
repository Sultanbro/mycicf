<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\News\NewsGetPostsRequest;
use App\Library\Services\PostsService;
use App\UserAnswer;
use Debugbar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class NewsController
 * @package App\Http\Controllers
 *
 */
class NewsController extends Controller
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
     * @param NewsGetPostsRequest $request
     * @return array
     *
     * @throws Exception
     */
    public function getPosts(NewsGetPostsRequest $request)
    {
        $user_isn = Auth::user()->ISN;
        $last_index = $request->get('lastIndex');
        $query = $request->get('query');

        Debugbar::startMeasure('getPosts');
        $response = $this->postsService->getPosts($user_isn, $last_index, $query);

        Debugbar::stopMeasure('getPosts');
        return $response;
    }

    public function birthday()
    {
        return view('news-birthday');
    }

    public function editComment(Request $request)
    {
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

    public function getView()
    {
        return view('news');
    }

    public function senateVote(Request $request)
    {
        $answers = $request->answers;
        foreach ($answers as $answer) {
            if ($answer['checked']) {
                $userAnswer = new UserAnswer();
                $userAnswer->question_id = $request->question;
                $userAnswer->answer_id = $answer['answer_id'];
                $userAnswer->user_isn = auth()->user()->ISN;
                $userAnswer->save();
            }
        }

        cache()->clear();

        return response()->json([
            'success' => true
        ]);
    }

    public function dev(Request $request)
    {
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

    public function index(Request $request)
    {
        return view('boss-says');
    }

    public function getBossPosts(Request $request, PostsService $postsService)
    {
        Debugbar::startMeasure('NewsController@getBossPosts');
        $user_isn = Auth::user()->ISN;
        $last_index = $request->get('lastIndex');
        $query = $request->get('query');

        $response = $postsService->getPosts($user_isn, $last_index, $query, true);

        Debugbar::stopMeasure('NewsController@getBossPosts');
        return $response;
    }
}
