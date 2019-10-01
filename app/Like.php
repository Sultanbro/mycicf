<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function getLikes($postId){
        $model = self::where('postId', $postId)
        ->get();
        return sizeof($model);
    }

    public function getIsLiked($postId, $isn) {
        $model = self::where('postId', $postId)
            ->where('user_isn', $isn)
            ->first();
        return $model === null ? 0 : 1;
    }
}
