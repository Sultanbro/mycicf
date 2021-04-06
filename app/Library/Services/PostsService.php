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
use Illuminate\Database\Eloquent\Relations\HasOne;
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
     * Генерируем ключ кэша для конкретного поста по его ID
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
     * @param $searchQuery
     * @param bool $boss
     * @param int $limit
     * @return array
     * @throws Exception
     */
    public function getPosts(string $user_isn, $last_index = null, string $searchQuery = null, bool $boss = false, int $limit = 5) {
        $response = [];
        $cacheTTL = now()->addMinutes(2);

        $query = Post::withCount('likes')
            ->with([
                'likes',
                'poll' => function (HasOne $builder) {
                    $builder->with([
                        'answers' => function (HasMany $builder) {
                            $builder->withCount('userAnswers');
                        },
                        'userAnswers'
                    ])
                        ->withCount('userAnswers');
                }
            ])
            ->orderBy('id', 'DESC')
            ->with('comments')
            ->limit($limit);

        if ($searchQuery) {
            $query = $query->where('post_text', 'like', '%' . trim($searchQuery) . '%');
        }

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
     * @param $isn
     * @return mixed
     * @throws Exception
     */
    private function getFullName($isn) {
        $ttl = now()->addMinutes(10);
        return cache()->remember('PostService@fullName::' . $isn, $ttl, function () use ($isn) {
            return (new User())->getFullName($isn);
        });
    }

    /**
     * Формируем ответ для поста
     *
     * @param Post $item
     * @param string $user_isn
     * @return array
     * @throws Exception
     */
    private function buildPostResponse(Post $item, string $user_isn) {
        if (isset($item->poll)) {
            $poll = [
                "question_id"    => $item->poll->id,
                "question_title" => $item->poll->question,
                "total_votes"    => $item->poll->user_answers_count,
                "answers"        => $item->poll->answers->map(function (Answer $answer) {
                    return [
                        "answer_id"    => $answer->id,
                        "answer_title" => $answer->value,
                        "answer_votes" => $answer->user_answers_count,
                        "checked"      => false
                    ];
                }),
            ];
        } else {
            $poll = [
                "question_id"    => null,
                "question_title" => null,
                "total_votes"    => null,
                "answers"        => null
            ];
        }

        return [
            'isn'        => $item->user_isn,
            'fullname'   => $this->getFullName($item->user_isn),
            'postText'   => $item->getText(),
            'pinned'     => $item->pinned,
            'postId'     => $item->id,
            'isMine'     => $item->is_mine,
            'edited'     => $item->is_edited,
            'likes'      => $item->likes_count,
            'isLiked'    => $item->likes->where('user_isn', '=', $user_isn)->count() > 0,
            'date'       => $item->created_at->format('d.m.Y H:i'),
            'userISN'    => $item->user_isn,
            'comments'   => $item->comments->map(function (Comment $comment) {
                return [
                    'commentText' => $comment->text,
                    'isMine'     => $comment->is_mine,
                    'userISN'     => $comment->user_isn,
                    'commentId'   => $comment->id,
                    'fullname'    => $this->getFullName($comment->user_isn),
                    'date'       => $comment->created_at->format('d.m.Y H:i'),
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
        cache()->flush();
        // cache()->delete($this->getResponseKey($id)); // or delete();
    }
}
