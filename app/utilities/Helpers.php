<?php

use App\Models\Admin\Product;

class HelperShop{
    public static function minPrice(){
      return  (Product::where('status',1)->min('price'));
    }

    public static function maxPrice(){
        return  (Product::where('status',1)->max('price'));
      }
}
