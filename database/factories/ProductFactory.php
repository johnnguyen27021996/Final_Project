<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city,
        'price' => rand(5, 30),
        'description' => $faker->paragraph(5, true),
        'cate_id' => \App\Category::pluck('id')->random()
    ];
});
