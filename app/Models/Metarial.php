<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metarial extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class,'metarial_product','metarial_id','products_id','id','id');
    }
}
