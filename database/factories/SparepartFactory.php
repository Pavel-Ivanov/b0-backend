<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sparepart;
use Faker\Generator as Faker;

$factory->define(Sparepart::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
    ];
});
