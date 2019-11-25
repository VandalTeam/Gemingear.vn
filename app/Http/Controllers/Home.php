<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner_model;
use App\Product_model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use Gloudemans\Shoppingcart\Facades\Cart;

class Home extends Controller
{
    protected $banner_model,$product;
    public function __construct()
    {
        $this->banner_model = new Banner_model();
        $this->product = new Product_model();
    }
    public function index(Request $request){
        $banner = $this->banner_model->getInfo();
        $product = $this->product->getfullInfo();
        $collection = collect($product)->paginate(5);
        if($request->ajax()){
            return view('customer.layout.pagination',['product'=>$collection]);
        }
        return view('customer.home',['banner'=>$banner,'product'=>$collection]);
    }
    public function detail(Request $request){
        $data = $this->product->product_detail(array('product.url'=> '/'.$request->path()))->toArray();
        return view('customer.detailproduct',['product'=>$data[0]]);
    }
    public function addcart(Request $res){
        $data = array(
            'id' => $res->id,
            'name' => $res->name, 
            'qty' => $res->qty,
            'price' => $res->price,
            'weight' => 550,
            'options' => ['size' => $res->image]
        );
        if(Cart::add($data)){
            $respone = array(
                'total_item'=>Cart::count(),
                'total' => Cart::total(),
                'product' => Cart::content(),
            );
            return $respone;
        }
    }
    public function getcart(){
        $data = Cart::content();
    }
    public function removecart(){
        
    }
}
