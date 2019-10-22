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
        ->join('category','category.id','=','products.category_id')
        ->join('menu','menu.id','=','products.menu_id')
        ->join('subcategory','subcategory.id','=','menu.subcategory_id')
        ->select('products.*','category.name as category_name','subcategory.name as subcategory_name','menu.name as menu_name')
        ->get();
    
    }
}
