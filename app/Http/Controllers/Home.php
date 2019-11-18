<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner_model;
use App\Product_model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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
        
        echo "<pre>";
        print_r ($collection);
        echo "</pre>";
        die;
        if ($request->ajax()) {
            return view('customer.layout.pagination',['product'=>$collection] );
        }
        return view('customer.home',['banner'=>$banner,'product'=>$collection]);
    }
    public function detail(Request $request){
        $data = $this->product->product_detail(array('product.url'=> '/'.$request->path()))->toArray();

        if(is_null($data[0]->promotion)==false){
            $price_sale =  floatval(str_replace(',','',$data[0]->price))*(100-$data[0]->promotion)/100;
            $data[0]->price_sale=$price_sale;
        }
        echo "<pre>";
        print_r ($data[0]);
        echo "</pre>";
        die;
        return view('customer.detailproduct',['product'=>$data[0]]);
    }
}
