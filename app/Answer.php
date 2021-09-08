<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Answer
 * @package App
 *
 * @property-read UserAnswer[]|Collection $userAnswers
 * @property-read int $user_answers_count
 */
class Answer extends Model {
    public function userAnswers() {
        return $this->hasMany(UserAnswer::class);
    }
}

