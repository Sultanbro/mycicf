<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = ['quiz_id',
        'question',];

    public function answers() {
        return $this->hasMany(QuizAnswers::class, 'question_id');
    }

}
