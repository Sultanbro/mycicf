<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $fillable = [
        'user_id',
        'all_try',
        'training_programs_id',
        'quiz_id',
        'assign_training_id',
    ];
}
