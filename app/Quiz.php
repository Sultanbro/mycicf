<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static truncate()
 */
class Quiz extends Model
{
    protected $fillable = ['name',
        'passing_score',
        'time',
        'description',
        ];

    public function quizQuestions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
