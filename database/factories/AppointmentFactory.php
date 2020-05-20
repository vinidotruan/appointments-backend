<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'patient_id' => App\Patient::all()->random()->id,
        'value' => $faker->randomFloat(),
        'date' =>  $faker->date('Y-m-d', 'now'),
        'notes' => $faker->text(),
        'cronogram' => $faker->text(),
        'todo_list' => $faker->text(),
        'abstract' => $faker->text(),
        'link' => $faker->url(),
        'receipt' => $faker->boolean(),
    ];
});