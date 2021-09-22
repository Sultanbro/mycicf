<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Branch;
use App\TrainingProgram;
use Faker\Generator as Faker;

$factory->define(TrainingProgram::class, function (Faker $faker) {
    return [
        'training_program_id' => rand(1,15),
        'quiz_id' => Branch::find(rand(4,100))->kias_id,
        'count_question' => rand(5,10),
        'try' => rand(1,5),
    ];
});
