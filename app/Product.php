<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','detail','price','description','category_product_id','user_id','status','discount_price'];
    public function category_product()
    {
    	return $this->belongTo('App\Category_product');
    }
     public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
