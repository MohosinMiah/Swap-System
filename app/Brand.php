<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Brand extends Model
{
    //
    /**
     * Get the Category that Brand
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
