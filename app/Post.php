<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use SoftDeletes;

    const NEW_POST = 'new';
    const EDITED_POST = 'edit';
    const LIKED_POST = 'like';
    const PINNED_POST = 'pinned';
    const DELETED_POST = 'deleted';
    const COMMENDTED_POST = 'commented';

    public function setPinned(){
        self::where('pinned', 1)->update([
            'pinned' => 0
            ]);
        $this->pinned = 1;
        $this->save();
    }

    public function getIsEdited($post_id) {
        $model = self::where('id', $post_id)
                ->first();

        if($model !== null) {
            return $model->created_at != $model->updated_at;
        }
    }

    public function getComments(){
        $comments = [];

        $model = Comment::where('post_id', $this->id)->get();
        foreach ($model as $comment) {
            array_push($comments, [
                'commentText' => $comment->text,
                'userISN' => $comment->user_isn,
                'commentId' => $comment->id,
                'fullname' => (new User)->getFullName($comment->user_isn),
                'date' => date('d.m.Y H:i', strtotime($comment->created_at)),
            ]);
        }
        return $comments;
    }

}
