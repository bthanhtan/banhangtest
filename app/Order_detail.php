<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable = ['product_id','order_id','quatity','until_price',];
    public function order()
    {
    	return $this->belongTo('App\Order');
    }
}
