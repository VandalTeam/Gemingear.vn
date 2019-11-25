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
            'weight' => 0,
            'options' => ['size' => $res->image]
        );
        if(Cart::add($data)){
            $respone = array(
                'total_item'=>Cart::count(),
                'total' => Cart::subtotal(),
                'product' => Cart::content(),
            );
            return $respone;
        }
    }
    public function viewcart(){
        return view('customer.viewcart');
    }

    public function removecart(Request $res){
        if(Cart::remove($res->rowId)){   
        }
        $respone = array(
            'total_item'=>Cart::count(),
            'total' => Cart::subtotal(),
            'product' => Cart::content(),
        );
        return $respone;
    }
    public function updatecart(Request $res){
        if(Cart::update($res->rowId, $res->qty)){
            $respone = array(
                'total_item'=>Cart::count(),
                'total' => Cart::subtotal(),
                'product' => Cart::content(),
            );
            return $respone;
        }
        
    }
    public function checkout(){
        return view('customer.checkout');
    }
    public function city_api(){
        return $this->fetch_api('https://thongtindoanhnghiep.co/api/city');
    }
    public function country_api(Request $res){
        return $this->fetch_api('https://thongtindoanhnghiep.co/api/city/'.$res->id.'/district');
    }
    public function fetch_api($url){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }
}
