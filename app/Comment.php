<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    public function getIsMineAttribute() {
        if (!auth()->check()) {
            return false;
        }

        return $this->user_isn === auth()->user()->ISN;
    }
}
