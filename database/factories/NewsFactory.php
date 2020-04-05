<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'announcement' => $faker->sentence(6),
        'body' => $faker->text(200),
        'image' => '/images/no-name.jpg',
        'meta_title' => $faker->sentence(6),
        'meta_description' => $faker->sentence(6),
        'alias' => $faker->slug(6, true),
        'published' => 1,
    ];
});
