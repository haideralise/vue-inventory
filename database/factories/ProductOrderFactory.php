<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\Product;
use App\ProductOrder;
use Faker\Generator as Faker;

$factory->define(ProductOrder::class, function (Faker $faker) {
    $product = Product::inRandomOrder()->first();
    return [
        'order_id' => Order::inRandomOrder()->first()->id,
        'product_id' => $product->id,
        'price' => $product->price,
        'quantity' => random_int(1,10)
    ];
});
