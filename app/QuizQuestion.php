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

    public function material()
    {
        return$this->hasMany(QuestionMaterial::class, 'question_id');
    }

}
