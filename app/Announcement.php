<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'thema',
        'user_id',
        'description',
        'date_time',
        'online',
        'space',
        'site',
        'type',
    ];
}
