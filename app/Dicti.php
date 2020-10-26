<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dicti extends Model
{
    protected $table = 'dicti';

    protected $fillable = [
        'isn',
        'fullname',
        'parent_isn',
        'parent_name',
        'condition_for_property',
        'type',
        'code',
        'numcode',
        'n_kids',
    ];

    public function childs() {
        return $this->hasMany('App\Dicti','parent_isn','isn') ;
    }
}
