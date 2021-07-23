<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = [
        'id',
        'parent_id',
        'name',
    ];

    public function childs() {
        return $this->hasMany('App\Contact','parent_id','id') ;
    }

//    public function childs2() {
//        return $this->hasMany('App\Contact','parent_isn','isn')->select(array('isn as id', 'fullname as label'));
//    }
}
