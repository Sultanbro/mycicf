<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Branch::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'kias_id' => \App\User::inRandomOrder()->first()->ISN,
        'kias_parent_id' => 0,
        'has_child' => $faker->boolean,
        'verified' => 1,
        'duty' => 1,
        'birthday' => $faker->dateTimeBetween(),
    ];
});
