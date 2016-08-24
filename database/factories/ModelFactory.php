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
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->words(5, true),
        'url' => $faker->url,
        'content' => $faker->sentence,
        'img' => $faker->imageUrl($width = 640, $height = 480),
        'created_by' => App\User::all()->random()->id,
    ];
});

$factory->define(App\Vote::class, function (Faker\Generator $faker) {
    $votes = ['up', 'down'];
    return [
        'user_id' => App\User::all()->random()->id,
        'post_id' => App\Post::all()->random()->id,
        'vote' => $votes[mt_rand(0, 1)],
    ];
});
