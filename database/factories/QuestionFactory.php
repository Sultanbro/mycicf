<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Question::class, function (Faker $faker) {
    return [
        'question' => $faker->text(20),
        'post_id' => \App\Post::inRandomOrder()->first()->id,
    ];
});
