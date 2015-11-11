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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'department' => $faker->sentence(4),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'id' => str_random(38),
        'secret' => str_random(10),
        'name' => $faker->word
    ];
});


