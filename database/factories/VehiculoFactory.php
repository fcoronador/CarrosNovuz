<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\vehiculo;
use Faker\Generator as Faker;

$factory->define(vehiculo::class, function (Faker $faker) {
    return [
        'placa' => strtoupper( $faker->unique()->bothify('???###')),
        'marca' => $faker->company,
        'modelo' => $faker->year($max = 'now')
    ];
});
