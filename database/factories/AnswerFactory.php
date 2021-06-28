<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Answer::class, function (Faker $faker) {
    return [
        'value' => $faker->text(10),
        'question_id' => \App\Question::inRandomOrder()->first()->id,
    ];
});
