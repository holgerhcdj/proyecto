<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Productos;
use Faker\Generator as Faker;

$factory->define(Productos::class, function (Faker $faker) {

    return [
        'tip_id' => $faker->randomDigitNotNull,
        'pas_nombre' => $faker->word,
        'pas_receta' => $faker->word,
        'pas_precio' => $faker->randomDigitNotNull,
        'pas_estado' => $faker->randomDigitNotNull
    ];
});
