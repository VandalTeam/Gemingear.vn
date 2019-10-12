<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

function getUser(){
    return Auth::user();
}
function Category(){
    return DB::table('category')->get();
}

function Subcategory($id){
    $where = array('category_id'=>$id);
    return DB::table('subcategory')->where($where)->get();
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