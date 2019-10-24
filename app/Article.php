<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id','title','sub_title','content','tag','status','status','category_article_id'];
    public function category_product()
    {
    	return $this->belongTo('App\Category_article');
    }
}
