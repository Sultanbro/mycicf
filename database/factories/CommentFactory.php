<?php

/** @var Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text(50),
        'post_id' => \App\Post::inRandomOrder()->first()->id,
        'user_isn' => \App\User::inRandomOrder()->first()->ISN,
    ];
});
