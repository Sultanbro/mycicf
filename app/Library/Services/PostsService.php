<?php

namespace App\Library\Services;

use App\Like;
use App\Post;
use App\User;
use Debugbar;
use Exception;
use Illuminate\Support\Collection;

/**+
 * Class PostsService
 *
 * Сервис для работы с постами
 *
 * @package App\Library\Services
 */
class PostsService
{
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
    public function getPosts(string $user_isn, $last_index = null, bool $boss = false, int $limit = 5)
    {
        $response = [];

        $query = Post::orderBy('id', 'DESC')->limit($limit);

        if ($boss) {
            $query = $query->where('user_isn', User::BOSS_ISN);
        }

        $query = $query->withCount('likes');

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
            $ttl = now()->addMinutes(10);
            $key = $this->getResponseKey($item->id);
            Debugbar::startMeasure($key);
            // Пока что реализовал вот так. Позже сделаю через relations
            $row = $this->buildPostResponse($item);

            $row['isLiked'] = (new Like())->getIsLiked($item->id, $user_isn);
            $row['isVoted'] = $item->getIsVoted($user_isn, $item->id);

            $response[] = $row;

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
     * @return array
     */
    private function buildPostResponse(Post $item) {
        return [
            'isn' => $item->user_isn,
            'fullname' => (new User())->getFullName($item->user_isn),
            'postText' => $item->getText(),
            'pinned' => $item->pinned,
            'postId' => $item->id,
            'edited' => $item->is_edited,
            'likes' => $item->likes_count,
            'date' => date('d.m.Y H:i', strtotime($item->created_at)),
            'userISN' => $item->user_isn,
            'comments' => $item->getComments(),
            'image' => $item->getImage(),
            'documents' => $item->getDocuments(),
            'youtube' => $item->getVideo(),
            'videos' => $item->getVideoUrl(),
            'post_poll' => $item->getPoll($item->id),
        ];
    }

    /**
     * Убиваем кэш только для указанного поста
     *
     * @param $id
     */
    public function forget($id) {
        // cache()->forget($this->getResponseKey($id)); // or delete();
    }
}
