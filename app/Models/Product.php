<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id',
        'category_id',
        'product_name',
        'product_slug',
        'product_code',
        'qty',
        'price',
        'image',
        'status'
    ];



    public function metarials(){
        return $this->belongsToMany(Metarial::class,'metarial_product','products_id','metarial_id','id','id');
    }


    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }



}
