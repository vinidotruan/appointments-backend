<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PlusInformation;
use Faker\Generator as Faker;

$factory->define(PlusInformation::class, function (Faker $faker) {
    return [
        'patient_id' => App\Patient::all()->random()->id,
        'emergency_contact' => $faker->phoneNumber,
        'name' => $faker->name,
        'observation' => $faker->text
    ];
});
