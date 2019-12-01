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
use App\Events\Notify;
use App\User;

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
        if(Auth::attempt($data)){
            $data = Auth::user();
            if($data->active==1){
                $request->session()->flash('login', 'Đăng nhập thành công');
                return redirect('');
            }else{
                Auth::logout();
                $request->session()->flash('fail', 'Đăng nhập thất bại');
                return redirect()->back();
            }
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
        $this->users->role = 'user';
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
            return redirect::to('http://gemingear.vn');
        }else{
            return redirect()->back();
        }
    }

    public function order(Request $res){
        $this->order->name_customer = $res->name_customer;
        $this->order->email = $res->email;
        $this->order->phone = $res->tel;
        $this->order->address = $res->address.'-'.$res->country.'-'.$res->city;
        $this->order->total = Cart::subtotal();
        $this->order->status = 0;
        $this->order->note = $res->note;
        $this->order->user_id = Auth::user()->id;
        if($this->order->save()){
            $data = array();
            $confim = array();
            $notify = array(
                'id'=>$this->order->id,
                'name'=>$res->name_customer,
                'tel'=>$res->tel,
                'address'=>$res->address.'-'.$res->country.'-'.$res->city,
                'total'=>Cart::subtotal(),
                'status' => 'Chưa xác thực',
            );
            event(new Notify($notify));
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

    public function notify(){
        $data = array('name'=>'acb');
        return event(new Notify($data));
    }
    public function update_profile(Request $res,User $model){
        $data = $res->except('_token'); 
        $update = $model->find($res->id);
        $update->name=$res->name;
        $update->email=$res->email;
        // $model->password=bcrypt($object->password);
        $update->tel=$res->tel;
        $update->address=$res->address;
        $update->save();
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
