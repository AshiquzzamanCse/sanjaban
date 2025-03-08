<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // public function subproducts()
    // {
    //     return $this->hasMany(Product::class,'subcategory_id','id');
    // }

    public function subproducts()
    {
        return $this->hasMany(Product::class, 'subcategory_id', 'id')
            ->where('status', 1); // Assuming 'active' is the column indicating whether the product is active
    }
}
