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


$factory->define(App\Userinfo::class, function (Faker\Generator $faker) {
    return [
        'mobile' => $faker->sentence(11),
        'realname' =>  $faker->sentence(4),
        'mail' => $faker->email,
        'iden' =>  $faker->sentence(4),
        'man' =>  $faker->sentence(4),
        'status' =>  $faker->sentence(4),
        'orietation' =>  $faker->sentence(4),
        'income' =>  $faker->sentence(4),
        'blood' => $faker->sentence(4),
        'birth' =>  $faker->sentence(4),
        'current' =>  $faker->sentence(4),
        'home' =>  $faker->sentence(4),
        'education' =>  $faker->sentence(4),
        'school' =>  $faker->sentence(4),
        'specialty' =>  $faker->sentence(4),
        'occupation' =>  $faker->sentence(4) ,
        'qq' =>  $faker->sentence(11),
        'sina' => $faker->sentence(11),
        'webchat' => $faker->sentence(11),
        'from' =>  $faker->sentence(4),
        'uid' =>  $faker->sentence(11),
        'uname' =>  $faker->sentence(4),
        'location' =>  $faker->sentence(4),
    ];
});
