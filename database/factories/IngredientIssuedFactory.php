<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingredient;
use App\IngredientIssued;
use Faker\Generator as Faker;

$factory->define(IngredientIssued::class, function (Faker $faker) {
    return [
        'ingredient_id' => Ingredient::inRandomOrder()->first()->id,
        'quantity' => random_int(1,10)
    ];
});
