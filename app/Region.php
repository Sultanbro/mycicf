<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    protected $fillable = [
        'isn',
        'name',
        'parentisn',
        'parentname',
        'regionisn',
    ];

    public function childs() {
        return $this->hasMany('App\Region','parentisn','isn') ;
    }
}
