<?php

use App\Models\Product;


if (!function_exists('lowercase')) {
    function lowercase($stirng){
        $string =  strtolower($stirng);

        return $string;
    }
}


function product_by_id($product_id){
    $product = Product::where('id', $product_id)->first();

    return $product;
}
