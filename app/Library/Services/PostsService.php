<?php

namespace App\Library\Services;

use App\Answer;
use App\Comment;
use App\Post;
use App\Question;
use App\User;
use Debugbar;
use Exception;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**+
 * Class PostsService
 *
 * Сервис для работы с постами
 *
 * @package App\Library\Services
 */
class PostsService {
    /**
     * Генерируем ключ кэша для конкретного поста по его айди
     *
     * @param int $postId
     * @return string
     */
    private function getResponseKey(int $postId) {
        return 'Posts::response::' . $postId;
    }

    /**
     * Получаем посты, начиная с указанного, либо сначала, если last_index не указан
     *
     * @param string $user_isn
     * @param $last_index
     * @param bool $boss
     * @param int $limit
     * @return array
     */
    public function getPosts(string $user_isn, $last_index = null, bool $boss = false, int $limit = 5) {
        $response = [];
        $cacheTTL = now()->addMinutes(1);

        $query = Post::withCount('likes')
            ->with([
                'likes',
                'poll' => function (HasMany $builder) {
                    $builder->with([
                        'answers' => function (HasMany $builder) {
                            $builder->withCount('userAnswers');
                        }
                    ])
                        ->withCount('userAnswers');
                }
            ])
            ->orderBy('id', 'DESC')
            ->with('comments')
            ->limit($limit);

        if ($boss) {
            $query = $query->where('user_isn', User::BOSS_ISN);
        }

        if ($last_index === null) {
            $model = $query
                ->get();
        } else {
            $model = $query
                ->where('id', '<', $last_index)
                ->get();
        }

        /**
         * @var Post[]|Collection $model
         */
        foreach ($model as $item) {
            $key = $this->getResponseKey($item->id);
            $cacheKey = sprintf("%s::user-%s", $key, $user_isn);
            Debugbar::startMeasure($key);
            $response[] = cache()->remember($cacheKey, $cacheTTL, function () use ($item, $user_isn) {
                return $this->buildPostResponse($item, $user_isn);
            });
            Debugbar::stopMeasure($key);
        }


//        $result = [
//            'success' => $success,
//            'error' => $error,
//            'post' => $response
//        ];

        // });

        return $response;
    }

    /**
     * Формируем ответ для поста
     *
     * TODO Метод неоптимальный, крайне желательно его оптимизировать. Пока что за это отвечает кэш
     *
     * @param Post $item
     * @param string $user_isn
     * @return array
     */
    private function buildPostResponse(Post $item, string $user_isn) {
        $poll = $item->poll->map(function (Question $question) {
            return [
                "question_id"    => $question->id,
                "question_title" => $question->question,
                "total_votes"    => $question->user_answers_count,
                "answers"        => $question->answers->map(function (Answer $answer) {
                    return [
                        "answer_id"    => $answer->id,
                        "answer_title" => $answer->value,
                        "answer_votes" => $answer->user_answers_count,
                        "checked"      => false
                    ];
                }),
            ];
        });

        return [
            'isn'        => $item->user_isn,
            'fullname'   => (new User())->getFullName($item->user_isn),
            'postText'   => $item->getText(),
            'pinned'     => $item->pinned,
            'postId'     => $item->id,
            'edited'     => $item->is_edited,
            'likes'      => $item->likes_count,
            'isLiked'    => $item->likes->where('user_isn', '=', $user_isn)->count() > 0,
            'date'       => date('d.m.Y H:i', strtotime($item->created_at)),
            'userISN'    => $item->user_isn,
            'comments'   => $item->comments->map(function (Comment $comment) {
                return [
                    'commentText' => $comment->text,
                    'userISN'     => $comment->user_isn,
                    'commentId'   => $comment->id,
                    'fullname'    => (new User)->getFullName($comment->user_isn),
                    'date'        => date('d.m.Y H:i', strtotime($comment->created_at)),
                ];
            }),
            'image'      => $item->getImage(),
            'documents'  => $item->getDocuments(),
            'youtube'    => $item->getVideo(),
            'videos'     => $item->getVideoUrl(),
            'post_poll'  => $poll,
            'isVoted'    => $item->getIsVoted($user_isn, $item->id),
        ];
    }

    /**
     * Убиваем кэш только для указанного поста
     *
     * @param $id
     * @throws Exception
     */
    public function forget($id) {
        cache()->forget($this->getResponseKey($id)); // or delete();
    }
}
