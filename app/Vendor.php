<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['name'];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }


}
