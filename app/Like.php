<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function getLikes($post_id){
        $model = self::where('post_id', $post_id)
        ->get();
        return sizeof($model);
    }

    public function getIsLiked($post_id, $isn) {
        $model = self::where('post_id', $post_id)
            ->where('user_isn', $isn)
            ->first();
        return $model === null ? 0 : 1;
    }
}
