<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','order_date','shipment_address','shipment_name','received_date','status','total',];
    public function order_detail()
    {
    	return $this->hasMany('App\Order_detail','order_detail_id');
    }
}
