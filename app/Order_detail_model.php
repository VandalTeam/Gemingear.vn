<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Order_detail_model extends ModelSetting
{
    //
    protected $table = 'order_detail';
    public $timestamps = false;
    public function detail($id){
        return DB::table('order_detail')->where('order_id','=',$id)
        ->join('product', 'product.id', '=', 'order_detail.product_id')
        ->select('order_detail.*','product.name as product_name')->get();
    }
    public function edit($where){
        return DB::table('order_detail')->where('order_detail.id','=',$where)
        ->join('product', 'product.id', '=', 'order_detail.product_id')
        ->select('order_detail.*','product.name as product_name')->get();
    }
}
