<?php

namespace App;

use App\Http\Controllers\NotificationController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Claim extends Model
{
    use SoftDeletes;

    //...

    public function user(){
        return $this->hasOne('App\User','ISN','user_isn');
    }
}
