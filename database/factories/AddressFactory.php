<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'patient_id' => App\Patient::all()->random()->id,
        'city' => $faker->city,
        'state' => $faker->state,
        'street' => $faker->streetName,
        'neighborhood' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'cep' => $faker->postcode(true),
    ];
});
