<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_article extends Model
{
    protected $fillable = ['name','status',];
    public function article()
    {
    	return $this->hasMany('App\Product','article_product_id');
    }
}
