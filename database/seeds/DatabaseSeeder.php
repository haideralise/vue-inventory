<?php

use App\Customer;
use App\Ingredient;
use App\IngredientIssued;
use App\IngredientPurchase;
use App\Order;
use App\Product;
use App\ProductOrder;
use App\Purchase;
use App\Vendor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Vendor::class, 5)->create();
        factory(Ingredient::class, 5)->create();
        factory(Purchase::class, 5)->create();

        factory(IngredientPurchase::class, 5)->create();
        factory(IngredientIssued::class, 5)->create();
        factory(Product::class, 5)->create();
        factory(Customer::class, 5)->create();
        factory(Order::class, 5)->create();
        factory(ProductOrder::class, 5)->create();




    }
}
