<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConductTraining extends Model
{
    protected $fillable = [
        'user_id',
        'theme',
        'description',
        'date',
        'connection',
    ];

    public function user()
    {
        return $this->hasOne(Branch::class, 'kias_id', 'user_id');
    }
}
