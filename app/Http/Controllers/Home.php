<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner_model;
use App\Product_model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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
        $product = DB::table('product')
            ->join('series', 'series.id', '=', 'product.series_id')
            ->join('brands', 'brands.id', '=', 'series.brand_id')->where('brands.url', $brand_url)
            ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')->where('subcategory.url', $subcategory_url)
            ->select('product.*')
            ->get();
        $collection = collect($product)->paginate(12);
        if ($request->ajax()) {
            return view('customer.layout.pagination_search', ['product' => $collection]);
        }
        return view('customer.product', ['product' => $collection]);
    }
    public function loadData_lv2($category_url, $sub, Request $request)
    {

        if (strpos($sub, 'price') == 0) {
            $sub = explode("-", $sub);
            if (count($sub) == 2) {
                $product = DB::table('product')->where('price', '>', $sub[1] * 1000000)->get();
            } else {
                $product = DB::table('product')->where('price', '>', $sub[1] * 1000000)->where('price', '<', $sub[\count($sub) - 1] * 1000000)->get();
            }
            $collection = collect($product)->paginate(12);
            if ($request->ajax()) {
                return view('customer.layout.pagination_search', ['product' => $collection]);
            }
            return view('customer.product', ['product' => $collection]);
        } else {
            $product = DB::table('product')
                ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')->where('subcategory.url', '=', $sub)
                ->join('category', 'category.id', '=', 'subcategory.category_id')->where('category.url', $category_url)
                ->select('product.*')->get();

            $collection = collect($product)->paginate(12);
            if ($request->ajax()) {
                return view('customer.layout.pagination_search', ['product' => $collection]);
            }
            return view('customer.product', ['product' => $collection]);
        }
    }
    public function loaddata_lv1($category, Request $request)
    {
        $product = DB::table('product')
            ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
            ->join('category', 'category.id', '=', 'subcategory.category_id')->where('category.url', $category)
            ->select('product.*')->get();

        $collection = collect($product)->paginate(12);
        if ($request->ajax()) {
            return view('customer.layout.pagination_search', ['product' => $collection]);
        }
        return view('customer.product', ['product' => $collection]);
    }
    public function search(Request $res, Product_model $model)
    {
        if ($res->name != null) {
            $data = DB::table('product')->where('name', 'like', $res->name . "%")->limit(4)->get();
            echo $data;
        }
    }
}
