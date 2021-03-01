<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'ISN' => $faker->unique()->numberBetween(1000, 10000),
        'username' => $faker->name,
        // 'email' => $faker->unique()->safeEmail,
        // 'email_verified_at' => now(),
        'password_hash' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'level' => $faker->unique()->numberBetween(1000, 10000),
        'short_name' => $faker->name,
        'full_name' => $faker->name,
        'session_id' => $faker->unique()->numberBetween(1000, 10000),
        'dept_isn' => $faker->unique()->numberBetween(1000, 10000),
    ];
});
