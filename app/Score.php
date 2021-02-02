<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function getLikedOrDisliked($scored_user_isn, $user_isn, $type) {
        $likedOrDisliked = self::where('scored_user_isn', $scored_user_isn)
            ->where('user_isn', $user_isn)
            ->where('type', $type)
            ->first();
        return $likedOrDisliked === null ? 0 : 1;
    }
}
