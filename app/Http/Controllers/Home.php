<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner_model;
use App\Product_model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Gloudemans\Shoppingcart\Facades\Cart;

class Home extends Controller
{
    protected $banner_model, $product;
    public function __construct()
    {
        $this->banner_model = new Banner_model();
        $this->product = new Product_model();
    }
    public function index(Request $request)
    {

        $banner = $this->banner_model->getInfo();
        $product = $this->product->getfullInfo();
        $collection = collect($product)->paginate(4);
        if ($request->ajax()) {

            return view('customer.layout.pagination', ['product' => $collection]);
        }
        return view('customer.home', ['banner' => $banner, 'product' => $collection]);
    }
    public function detail(Request $request)
    {
        $data = $this->product->product_detail(array('product.url' => '/' . $request->path()))->toArray();
        if (is_null($data[0]->promotion) == false) {
            $price_sale =  floatval(str_replace(',', '', $data[0]->price)) * (100 - $data[0]->promotion) / 100;
            $data[0]->price_sale = $price_sale;
        }
        return view('customer.detailproduct', ['product' => $data[0]]);
    }

    public function loadData_lv3($category_url, $subcategory_url, $brand_url, Request $request)
    {
        $collection = collect($this->product->loadData_lv3($category_url, $subcategory_url, $brand_url))->paginate(12);
        if ($request->ajax()) {
            return view('customer.layout.pagination_search', ['product' => $collection]);

        }
        return view('customer.product', ['product' => $collection]);
    }

    public function loadData_lv2($category_url, $sub, Request $request)
    {

        $collection = collect($this->product->loadData_lv2($category_url, $sub))->paginate(12);
        if ($request->ajax()) {
            return view('customer.layout.pagination_search', ['product' => $collection]);
        }
        return view('customer.product', ['product' => $collection]);
    }
    public function loaddata_lv1($category, Request $request)
    {
        $collection = collect($this->product->loaddata_lv1($category))->paginate(12);
        if ($request->ajax()) {
            return view('customer.layout.pagination_search', ['product' => $collection]);
        }
        return view('customer.product', ['product' => $collection]);
    }
    public function search(Request $res, Product_model $model)
    {
        if ($res->name != null) {
            $data = $this->product->search($res);
            echo $data;
        }

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
