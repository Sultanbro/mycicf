<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Score::class, function (Faker $faker) {
    return [
        'user_isn' => \App\User::inRandomOrder()->first()->ISN,
        'type' => $faker->randomElement([
            'like',
            'dislike'
        ]),
        'scored_user_isn' => \App\User::inRandomOrder()->first()->ISN,
    ];
});
