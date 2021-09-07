<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionMaterial extends Model
{
    protected $fillable = ['question_id',
        'link'];
}
