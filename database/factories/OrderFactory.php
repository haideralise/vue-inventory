<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'discount' => random_int(0,10),
        'customer_id' => Customer::inRandomOrder()->first()->id
    ];
});
