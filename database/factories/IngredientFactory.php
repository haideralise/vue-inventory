<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingredient;
use App\Vendor;
use Faker\Generator as Faker;

$factory->define(Ingredient::class, function (Faker $faker) {
    return [
        'vendor_id' => Vendor::inRandomOrder()->first()->id,
        'unit' => ['kg', 'packet', 'liter'][rand(0,2)],
        'name' => $faker->colorName,
        'price' => random_int(1,100)
    ];
});
