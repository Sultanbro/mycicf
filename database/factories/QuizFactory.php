<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quiz;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'name' => $faker->text,
        'passing_score' => $faker->numberBetween($min = 70, $max = 90),
        'time' => $faker->time('H:i:s', date('H:i:s', rand(1,54000))),
        'description' => $faker->text,
    ];
});
