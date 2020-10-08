<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Centcoin
 * @package App
 * @property integer $user_isn
 * @property integer $centcoins
 */
class Centcoin extends Model
{
    public function fullInfo() {
        return $this->hasMany('App\CentcoinHistory','changed_user_isn','user_isn') ;
    }
}
