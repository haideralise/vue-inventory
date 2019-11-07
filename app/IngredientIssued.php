<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientIssued extends Model
{
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
