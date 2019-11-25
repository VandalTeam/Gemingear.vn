<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Auth;
use Validator;
use App\Users;
use Mail;
use App\Mail\SendMail;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CheckValidate;
use App\Order_model;
use App\Order_detail_model;
use Gloudemans\Shoppingcart\Facades\Cart;

class Customer extends Controller
{
    //
    protected $users,$info,$check,$order,$order_detail;
    public function __construct()
    {
        $this->users = new Users();
        $this->order = new Order_model();
        $this->order_detail = new Order_detail_model();
    }
    public function login(Request $request){
        $data = $request->except('_token');
        if(Auth::attempt($data) && Auth::user()->acitve){
            $request->session()->flash('login', 'Đăng nhập thành công');
            return redirect('');
        }else{
            Auth::logout();
            $request->session()->flash('fail', 'Đăng nhập thất bại');
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('');
    }
    public function signup(Request $res){
        $validator = \Validator::make($res->all(), [
            'email' => 'unique:users',
        ],
        [
            'unique' => ':attribute đã tồn tại'
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $this->users->name = $res->input('last_name').' '.$res->input('first_name');
        $this->users->email = $res->input('email');
        $this->users->password = bcrypt($res->input('password'));
        $this->users->active = '0';
        $this->users->role = '1';
        $message = array(
            'name' => $res->input('last_name').' '.$res->input('first_name'),
            'link' => 'http://gemingear.vn/customer/update/'.$res->input('email'),
            'email' => $res->input('email'),
        );
        if($this->users->save()){
            Mail::to($res->input('email'))->send(new SendMail('Xác nhận thông tin địa chỉ email tại Gemingear.vn',$message));
            return response()->json(['success'=>'Đăng ký thành công vui lòng kiểm tra email của bạn']);
        }else{
            return response()->json(['success'=>'Đăng ký thất bại! Xin kiểm tra lại']);
        }
    }

    public function update($email){
        $where = array('email'=>$email);
        if($this->users->updateInfo($where,array('active'=>1))){
            return Redirect::to('http://gemingear.vn');
        }else{
            return redirect()->back();
        }
    }
    public function loadData($category_url,$subcategory_url,$brand_url){
        $data= DB::table('product')
        ->join('series','series.id','=','product.series_id')
        ->join('brands','brands.id','=','series.brand_id')->where('brands.url',$brand_url)
        ->join('subcategory','subcategory.id','=','product.subcategory_id')->where('subcategory.url',$subcategory_url)
        ->select('product.*')
        ->get();
    }

    public function order(Request $res){
        // $data = array_filter($res->except('_token'));
        $this->order->name_customer = $res->name_customer;
        $this->order->email = $res->email;
        $this->order->phone = $res->tel;
        $this->order->address = $res->address.'-'.$res->country.'-'.$res->city;
        $this->order->total = Cart::subtotal();
        $this->order->status = 0;
        $this->order->note = $res->note;
        $this->order->customer_id = 0;
        if($this->order->save()){
            $data = array();
            $confim = array();
            foreach (Cart::content() as $value) {
                $order_detail = array(
                    'order_id' => $this->order->id,
                    'product_id' =>  $value->id,
                    'price' => $value->price, 
                    'qty' => $value->qty,
                    'price_sale' => $value->price,
                );
                $test = array(
                    'order_id' => $this->order->id,
                    'name' => $value->name,
                    'product_id' =>  $value->id,
                    'price' => $value->price, 
                    'qty' => $value->qty,
                    'price_sale' => $value->price,
                );
                array_push($data,$order_detail);
                array_push($confim,$test);
            }
            if($this->order_detail->insert($data)){
                $confim = array(
                    'infomation' => $this->order->toArray(),
                    'product' => $confim,
                );
                $res->session()->flash('confim', $confim);
                Cart::destroy();
                return \redirect('/confim');
            }
        }
    }
    public function confim(){
        return view('customer.confim');
    }
}
