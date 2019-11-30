<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Order_detail_model extends ModelSetting
{
    //
    protected $table = 'order_detail';
    public $timestamps = true;
    public function detail($id){
        return DB::table('order_detail')->where('order_id','=',$id)
        ->join('product', 'product.id', '=', 'order_detail.product_id')
        ->join('orders', 'orders.id', '=', 'order_detail.order_id')
        ->select('order_detail.*','product.name as product_name','orders.status as status')->get();
    }
}
