<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TrainingProgram;
use Faker\Generator as Faker;

$factory->define(TrainingProgram::class, function (Faker $faker) {
    return [
        'name' => $faker->text,
        'description' => $faker->text,
    ];
});
