<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Rainsens\Adm\Models\AdmUser;

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

$factory->define(AdmUser::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'password' => bcrypt('adm'),
        'remember_token' => Str::random(10),
    ];
});
