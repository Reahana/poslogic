<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
//new code
    protected $casts = [
        'specifications' => 'array',
        'features'       => 'array',
        'benefits'       => 'array',
        'call_for_price' => 'boolean',
    ];
    //new code end
    public function getRouteKeyName() {
        return 'slug';
    }

    public function image()
    {
        return $this->hasOne(Productimage::class, 'product_id')
            ->select('id', 'image', 'alt_text', 'title', 'width', 'height', 'sort_order', 'product_id')
            ->orderBy('sort_order');
    }

    public function images()
    {
        return $this->hasMany(Productimage::class, 'product_id')
            ->select('id', 'image', 'alt_text', 'title', 'width', 'height', 'sort_order', 'product_id')
            ->orderBy('sort_order');
    }

//    public function image()
//    {
//        return $this->hasOne(Productimage::class, 'product_id')->select('id','image','product_id');
//    }
//    public function images()
//    {
//        return $this->hasMany(Productimage::class, 'product_id')->select('id','image','product_id');
//    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id')->select('id');
    }
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id')->select('id','name','slug');
    }
    public function subcategory()
    {
        return $this->hasOne(Subcategory::class,'id','subcategory_id')->select('id','subcategoryName','slug');
    }
    public function childcategory()
    {
        return $this->hasOne(Childcategory::class,'id','childcategory_id')->select('id','childcategoryName','slug');
    }
    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id')->select('id','name','slug');
    }
    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size','productsizes')->withTimestamps();
    }
    public function colors()
    {
        return $this->belongsToMany('App\Models\Color','productcolors')->withTimestamps();
    }
    
    public function prosizes()
    {
        return $this->hasMany('App\Models\Productsize');
    }
    public function procolors()
    {
        return $this->hasMany('App\Models\Productcolor');
    }
    
     public function prosize()
    {
        return $this->hasOne(Productsize::class, 'product_id');
    }
     public function procolor()
    {
        return $this->hasOne(Productcolor::class, 'product_id');
    }
}
