<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tipos;
use Faker\Generator as Faker;

$factory->define(Tipos::class, function (Faker $faker) {

    return [
        'tip_descripcion' => $faker->word,
        'tip_estado' => $faker->randomDigitNotNull,
        'tip_fecha' => $faker->word
    ];
});
