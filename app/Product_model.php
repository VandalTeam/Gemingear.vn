<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Product_model extends ModelSetting
{
    //
    protected $table = 'products';
    public $timestamps = false;
    public function getfullInfo(){
        return DB::table('products')
        ->join('promotions','promotions.id','=','products.promotion_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->join('subcategory','subcategory.id','=','products.subcategory_id')
        ->select('products.*','promotions.name as promotion_name','subcategory.name as subcategory_name','brands.name as brand_name')
        ->get();
    
    }
}
