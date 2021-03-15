<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Like::class, function (Faker $faker) {
    return [
        'user_isn' => \App\User::inRandomOrder()->first()->ISN,
        'post_id' => \App\Post::inRandomOrder()->first()->id,
    ];
});
