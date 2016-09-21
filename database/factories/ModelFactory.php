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

$factory->define(ProjManager\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => '12345',
        'remember_token' => str_random(10),
    ];
});

$factory->define(ProjManager\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'obs' => $faker->sentence
    ];
});

$factory->define(ProjManager\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'owner_id' => rand(1,5),
        'client_id' => rand(1,5),
        'name' => $faker->sentence(2),
        'description' => $faker->sentence,
        'progress' => $faker->randomFloat(0,0,100),
        'status' => $faker->randomFloat(0,0,5),
        'due_date' => $faker->dateTimeBetween('now', '3 years')
    ];
});

$factory->define(ProjManager\Entities\ProjectNote::class, function (Faker\Generator $faker) {
    return [
        'project_id' => rand(1,5),
        'title' => $faker->sentence,
        'note' => $faker->sentences(4, true),
    ];
});