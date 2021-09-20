<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\QuizAnswers;
use Faker\Generator as Faker;

$factory->define(QuizAnswers::class, function (Faker $faker) {
    return [
        'answer' => $faker->text(8),
        'right' => $faker->numberBetween($min = 0, $max = 1),
        'question_id' => \App\Quiz::inRandomOrder()->first()->id,
    ];
});
