<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //protected $table = "productos";
    function brand(){
        return $this->belongsTo(Brand::class);
    }

    function categories(){
        return $this->belongsTo(Categories::class);
    }
}
