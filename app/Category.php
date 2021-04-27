<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;

class Category extends Model
{
     /**
     * Get the Brands for the Category.
     */
    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

}
