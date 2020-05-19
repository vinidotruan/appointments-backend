<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        "user_id" => App\User::all()->random()->id,
        "name" => $faker->word(),
        "telephone" => $faker->randomNumber(9),
        "phone" => $faker->randomNumber(9),
        "birthday" => $faker->date('Y-m-d', 'now'),
        "cpf" => $faker->cpf(),
        "rg" => $faker->rg()
    ];
});
