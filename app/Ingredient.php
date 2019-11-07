<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name', 'unit', 'price','vendor_id'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function purchases(){
        return $this->belongsToMany(Purchase::class, 'ingredient_purchases');
    }

    public function issued(){
        return $this->belongsToMany(IngredientIssued::class, 'ingredient_issueds');
    }


    public static function AvailableUnits()
    {
        return ['kg', 'packet', 'litter'];
    }

}
