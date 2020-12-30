<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Campaign;
use Faker\Generator as Faker;

$factory->define(Campaign::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->paragraph(10),
        'address' => $faker->address,
        'required' => rand(5000, 1000),
        'collected' => rand(5000, 1000),
    ];
});
