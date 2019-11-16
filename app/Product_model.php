<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Product_model extends ModelSetting
{
    //
    protected $table = 'product';
    public $timestamps = false;
    public function getfullInfo(){
        return DB::table('product')
        ->join('promotions','promotions.id','=','product.promotion_id')
        ->join('brands','brands.id','=','product.brand_id')
        ->join('subcategory','subcategory.id','=','product.subcategory_id')
        ->select('product.*','promotions.name as promotion_name','subcategory.name as subcategory_name','brands.name as brand_name')

        ->get();
    }
    public function product_edit($where){
        return DB::table('product')
        ->join('promotions','promotions.id','=','product.promotion_id')
        ->join('brands','brands.id','=','product.brand_id')
        ->join('subcategory','subcategory.id','=','product.subcategory_id')
        ->where($where)
        ->select('product.*','promotions.name as promotion_name','subcategory.name as subcategory_name','brands.name as brand_name','subcategory.category_id as category_id')
        ->get();
    }
}
