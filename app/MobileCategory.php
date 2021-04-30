<?php

namespace App;

use App\Category;
use App\Brand;
use Illuminate\Database\Eloquent\Model;

class MobileCategory extends Model
{
     /**
     * Get the Category that Brand
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     /**
     * Get the Category that Brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
