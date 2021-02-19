<?php

namespace App\Library\Services;

use App\Like;
use App\Post;
use App\User;
use Illuminate\Support\Collection;

class PostsService
{
    public function getPosts($last_index, string $user_isn, $limit = 5)
    {
        $response = [];

        $query = Post::orderBy('id', 'DESC')
            ->limit($limit);

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
            $key = 'getPosts::postResponse::' . $item->id;

            \Debugbar::startMeasure($key);
            // Пока что реализовал вот так. Позже сделаю через relations
            $response[] = cache()->remember($key, $ttl, function () use ($item, $user_isn) {
                return [
                    'isn' => $item->user_isn,
                    'fullname' => (new User())->getFullName($item->user_isn),
                    'postText' => $item->getText(),
                    'pinned' => $item->pinned,
                    'postId' => $item->id,
                    'edited' => (new Post())->getIsEdited($item->id),
                    'likes' => (new Like())->getLikes($item->id),
                    'isLiked' => (new Like())->getIsLiked($item->id, $user_isn),
                    'date' => date('d.m.Y H:i', strtotime($item->created_at)),
                    'userISN' => $item->user_isn,
                    'comments' => $item->getComments(),
                    'image' => $item->getImage(),
                    'documents' => $item->getDocuments(),
                    'youtube' => $item->getVideo(),
                    'videos' => $item->getVideoUrl(),
                    'post_poll' => $item->getPoll($item->id),
                    'isVoted' => $item->getIsVoted($user_isn, $item->id),
                ];
            });
            \Debugbar::stopMeasure($key);
        }


//        $result = [
//            'success' => $success,
//            'error' => $error,
//            'post' => $response
//        ];

        // });

        return $response;
    }

    public function getPostsOptimized($last_index, string $user_isn) {
        $response = [];

        if ($last_index === null) {
            $model = Post::orderBy('id', 'DESC')
                ->limit(5)
                ->get();
        } else {
            $model = Post::orderBy('id', 'DESC')
                ->where('id', '<', $last_index)
                ->limit(5)
                ->get();
        }

        // TODO Оптимизировать этот блок тоже
        foreach ($model as $item) {
            $response[] = [
                'isn' => $item->user_isn,
                'fullname' => (new User())->getFullName($item->user_isn),
                'postText' => $item->getText(),
                'pinned' => $item->pinned,
                'postId' => $item->id,
                'edited' => (new Post())->getIsEdited($item->id),
                'likes' => (new Like())->getLikes($item->id),
                'isLiked' => (new Like())->getIsLiked($item->id, $user_isn),
                'date' => date('d.m.Y H:i', strtotime($item->created_at)),
                'userISN' => $item->user_isn,
                'comments' => $item->getComments(),
                'image' => $item->getImage(),
                'documents' => $item->getDocuments(),
                'youtube' => $item->getVideo(),
                'videos' => $item->getVideoUrl(),
                'post_poll' => $item->getPoll($item->id),
                'isVoted' => $item->getIsVoted($user_isn, $item->id),
            ];
        }


//        $result = [
//            'success' => $success,
//            'error' => $error,
//            'post' => $response
//        ];

        // });

        return $response;
    }
}
