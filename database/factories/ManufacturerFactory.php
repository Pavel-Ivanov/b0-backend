<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\Countries;
use App\Models\Manufacturer;
use Faker\Generator as Faker;

$factory->define(Manufacturer::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'country' => Countries::RU,
    ];
});
