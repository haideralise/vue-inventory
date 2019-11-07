<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingredient;
use App\IngredientPurchase;
use App\Purchase;
use Faker\Generator as Faker;

$factory->define(IngredientPurchase::class, function (Faker $faker) {
    $ingredient = Ingredient::inRandomOrder()->first();
    return [
        'purchase_id' => Purchase::inRandomOrder()->first()->id,
        'ingredient_id' => $ingredient->id,
        'price' => $ingredient->price,
        'quantity' => random_int(1,10)
    ];
});
