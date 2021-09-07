<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizForKias extends Model
{
    protected $fillable = [
        'quiz_id',
        'user_id',
        'count_question',
        'day',
        'try',
        'training_program_id'
    ];
}
