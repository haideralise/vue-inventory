<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_purchases');
    }
}
