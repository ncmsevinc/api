<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'detail' => $faker->paragraph,
        'price'=> $faker->randomFloat(2,1,100),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(2,50)
    ];
});
