<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'cat_id' => random_int(1, 20),
        'title' => $faker->company(),
        'description' => $faker->text(200),
        'image' =>'/images/blank.jpg',
        'price' => random_int(1, 1000)*10,
        'amount' => random_int(0, 100),
    ];
});
