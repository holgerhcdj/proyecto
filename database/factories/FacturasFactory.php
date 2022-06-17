<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Facturas;
use Faker\Generator as Faker;

$factory->define(Facturas::class, function (Faker $faker) {

    return [
        'per_id' => $faker->randomDigitNotNull,
        'flo_id' => $faker->randomDigitNotNull,
        'ped_id' => $faker->randomDigitNotNull,
        'fac_numero_facturas' => $faker->word,
        'fac_fecha' => $faker->word
    ];
});
