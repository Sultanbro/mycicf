<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Question
 * @package App
 *
 * @property-read Answer[]|Collection $answers
 * @property-read UserAnswer[]|Collection $userAnswers
 * @property-read int $user_answers_count
 */
class Question extends Model
{
    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function userAnswers() {
        return $this->hasMany(UserAnswer::class);
    }
}
