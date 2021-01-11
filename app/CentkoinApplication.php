<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentkoinApplication extends Model
{
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function centkoin(){
        return $this->hasOne('App\StoreItem', 'price', 'store_item_id');
    }

    public function centcoin_items(){
        return $this->hasOne('App\StoreItem','id','store_item_id') ;
    }
}
