<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FacturaDetalles;
use Faker\Generator as Faker;

$factory->define(FacturaDetalles::class, function (Faker $faker) {

    return [
        'fac_id' => $faker->randomDigitNotNull,
        'fade_detalle_trabajo' => $faker->word,
        'fade_valor_servicio' => $faker->word,
        'fade_descuento' => $faker->word,
        'fade_valor_total' => $faker->word
    ];
});
