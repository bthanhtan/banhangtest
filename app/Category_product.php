<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_product extends Model
{
    protected $fillable = ['name','status',];
    public function products()
    {
    	return $this->hasMany('App\Product','category_product_id');
    }
}
