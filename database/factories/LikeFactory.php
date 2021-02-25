<?php

/** @var Factory $factory */

use App\Like;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'user_isn' => \App\User::inRandomOrder()->first()->ISN,
        'post_id' => \App\Post::inRandomOrder()->first()->id,
    ];
});
