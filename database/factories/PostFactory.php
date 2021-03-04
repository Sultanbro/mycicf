<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'user_isn' => '1144',
        'post_text' => $faker->text(1000),
        'pinned' => $faker->boolean,
        'from_kias' => $faker->boolean,
    ];
});
