<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreItem extends Model
{
    public function centkoin(){
        return $this->hasOne('App\CentkoinApplication','store_item_id','price') ;
    }
    public function items(){
        return $this->hasOne('App\CentkoinApplication','store_item_id','name') ;
    }
}
