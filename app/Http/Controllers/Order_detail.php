<?php

namespace App\Http\Controllers;

use App\Order_detail_model;
use Illuminate\Http\Request;

class Order_detail extends Controller
{
    //
    protected $model;
    public function __construct()
    {
        $this->model = new Order_detail_model();
    }
    public function detail(Request $res,$id){
        $data = $this->model->detail($id);
        return view('admin.order_detail',['order'=>$data]);
    }
}
