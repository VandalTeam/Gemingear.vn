<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function getUser(){
    return  Auth::user();

}
function Category(){
   return DB::table('category')->get();
}
function Brand(){
    return DB::table('brands')->get();
 }
 function Brand_sub($sub_id)
 {
    return DB::table('product')
    ->where('subcategory_id',$sub_id)
    ->join('series','series.id','=','product.series_id')
    ->join('brands','brands.id','=','series.brand_id')
    ->select('brands.name as brand_name')
    ->distinct()
    ->get();
 }
 function Series($id)
 {
    return DB::table('series')->where('brand_id',$id)->get();
 }
 function Promotion(){
    return DB::table('promotions')->get();
 }
function Subcategory_id($id)
{
    return DB::table('subcategory')->where('category_id',$id)->get();
}
function Subcategory()
{
    return DB::table('subcategory')->get();

}
function Products()
{
     return DB::table('products')
    ->join('promotions','promotions.id','=','products.promotion_id')
    ->join('brands','brands.id','=','products.brand_id')
    ->join('subcategory','subcategory.id','=','products.subcategory_id')
    ->select('products.*','promotions.name as promotion_name','subcategory.name as subcategory_name','brands.name as brand_name')
    ->get();

}
function status($request,$where){
    if($where){
        $request->session()->flash('success', 'Thành Công');
    }else{
        $request->session()->flash('fail', 'Thất Bại');
   }
}

function BenSort($data,$value,$arrkey){
    $key = array_search($value, array_column($data, $arrkey));
    $arr = array($data[$key]);
    unset($data[$key]);
    $new=array_merge($arr,$data);
    return $new;
}

function to_slug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}
?>