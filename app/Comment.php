<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
<<<<<<< HEAD
    use SoftDeletes;

    public function getIsMineAttribute() {
        if (!auth()->check()) {
            return false;
        }

        return $this->user_isn === auth()->user()->ISN;
    }
=======
    //
>>>>>>> origin/master
}
