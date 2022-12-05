<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','status'];


    public function products(){
        return $this->hasMany(Product::class);
    }

    public static function get_brands(){
        return Cache::remember('_brands', now()->addHours(4), function(){
            return Brand::orderBy('id','desc')->get();
        });
    }

    public static function cache_forget(){
        return Cache::forget('_brands');
    }

    public static function boot(){
        parent::boot();

        static::created(function(){
            self::cache_forget();
        });

        static::updated(function(){
            self::cache_forget();
        });

        static::deleted(function(){
            self::cache_forget();
        });
    }
}
