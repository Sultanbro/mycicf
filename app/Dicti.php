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
        'code',
        'numcode',
        'n_kids',
    ];
}
