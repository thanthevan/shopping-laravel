<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	public $timestamps = false;
    protected $table= 'orderdetail';

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function order()
    {
        return $this->belongsTo('App\Order','order_id','id');
    }

    public static function count_product_order($id)
    {
        $count = OrderDetail::join('Order', 'Order.id', '=', 'OrderDetail.order_id')->where('status','=',1)->where('product_id','=',$id)->sum('OrderDetail.amount');
        return (int)$count;
    }
}
