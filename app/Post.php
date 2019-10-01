<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function setPinned(){
        self::where('pinned', 1)->update([
            'pinned' => 0
            ]);
        $this->pinned = 1;
        $this->save();
    }

    public function changedText($postId, $isn) {

    }
}
