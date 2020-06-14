<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'patient_id' => App\Patient::all()->random()->id,
        'city_id' => App\City::all()->random()->id,
        'street' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'cep' => $faker->postcode(true),
    ];
});
