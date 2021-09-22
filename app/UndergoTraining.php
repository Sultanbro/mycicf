<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UndergoTraining extends Model
{
    protected $fillable = [
        'theme',
        'user_id',
        'useful',
        'comment',
        'connection',
    ];

    public function user()
    {
        return $this->hasOne(Branch::class, 'kias_id', 'user_id');
    }
}
