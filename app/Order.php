<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'description', 'discount'];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_orders');
    }
}
