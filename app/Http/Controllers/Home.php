<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner_model;

class Home extends Controller
{
    protected $banner_model;
    public function __construct()
    {
        $this->banner_model = new Banner_model();
    }
    public function index(){
        $banner = $this->banner_model->getInfo();
        return view('customer.home',['banner'=>$banner]);
    }
}
