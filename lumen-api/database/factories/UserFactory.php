<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Illuminate\Support\Str;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $hasher = app()->make('hash');
    $password = $hasher->make('password');
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'role' => $faker->randomElement(['administrator' ,'customer']),
        'api_token' => sha1(time().rand(1,9999)),
        'remember_token' => Str::random(10),
    ];
});
