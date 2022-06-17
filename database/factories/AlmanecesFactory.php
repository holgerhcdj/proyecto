<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Almaneces;
use Faker\Generator as Faker;

$factory->define(Almaneces::class, function (Faker $faker) {

    return [
        'pst_razon_social' => $faker->word,
        'pst_rep_legal' => $faker->word,
        'pst_direccion' => $faker->word,
        'pst_telefono' => $faker->word
    ];
});
