<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\conductor;
use Faker\Generator as Faker;

$factory->define(conductor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'numID' => $faker->unique()->numberBetween($min = 30000000, $max = 1099646919),
        'estado' => 'True',
        'placa_veh' =>App\vehiculo::all()->random()->placa,
    ];
});
