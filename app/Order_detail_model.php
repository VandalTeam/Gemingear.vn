<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail_model extends ModelSetting
{
    protected $table = 'order_detail';
    protected $fillable =['order_id','product_id','price','qty','price_sale'];
}
