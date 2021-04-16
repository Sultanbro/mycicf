<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Answer::class, function (Faker $faker) {
    return [
        'value' => $faker->word,
        'question_id' => \App\Question::inRandomOrder()->first()->id,
    ];
});
