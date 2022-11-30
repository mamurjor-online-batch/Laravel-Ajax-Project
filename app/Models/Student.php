<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','roll','reg'];


    // accessors
    public function setNameAttribute($value){
        $this->attributes['name'] = strtoupper($value);
    }

    // mutators 
    public function getNameAttribute($value){
        return strtolower($value);
    }


}
