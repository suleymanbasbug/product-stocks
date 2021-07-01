<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Category;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;
    function images(){
        return $this->hasMany(Image::class,'product_id','id');
    }

    function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    function brand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }
}
