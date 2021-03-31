<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'user_isn' => \App\User::inRandomOrder()->first()->ISN,
        'post_text' => $faker->text(2000),
        'pinned' => $faker->boolean,
        'from_kias' => $faker->boolean,
    ];
});
