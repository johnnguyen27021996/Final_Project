<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Review::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'rate' => rand(1, 5),
        'body' => $faker->paragraph(5, true),
        'product_id' => \App\Product::pluck('id')->random()
    ];
});
