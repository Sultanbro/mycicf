<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'user_isn' => \App\User::inRandomOrder()->first()->ISN,
        'post_text' => $faker->paragraphs(4, true),
        'pinned' => 0,
        'from_kias' => $faker->boolean,
    ];
});
