<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static truncate()
 */
class QuizAnswers extends Model
{
    protected $fillable = ['question_id',
        'answer',
        'right',
    ];
}
