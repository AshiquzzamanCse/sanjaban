<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function categoryHomeTabOne()
    {
        return $this->belongsTo(SubCategory::class,'category_tab_one_id','id');
    }

    public function categoryHomeTabTwo()
    {
        return $this->belongsTo(Category::class,'category_tab_two_id','id');
    }

    public function categoryHomeTabThree()
    {
        return $this->belongsTo(Category::class,'category_tab_three_id','id');
    }

    public function categoryHomeTabFour()
    {
        return $this->belongsTo(Category::class,'category_tab_four_id','id');
    }

    public function featureProductOne()
    {
        return $this->belongsTo(Product::class, 'feature_product_one')->withDefault();
    }

    public function featureProductTwo()
    {
        return $this->belongsTo(Product::class, 'feature_product_two')->withDefault();
    }

    public function featureProductThree()
    {
        return $this->belongsTo(Product::class, 'feature_product_three')->withDefault();
    }

    public function featureProductFour()
    {
        return $this->belongsTo(Product::class, 'feature_product_four')->withDefault();
    }
}
