<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Users;
use Mail;
use App\Mail\SendMail;
use Redirect;
use App\Http\Requests\CheckValidate;

class Customer extends Controller
{
    //
    protected $users,$info,$check;
    public function __construct()
    {
        $this->users = new Users();
    }
    
    public function login(Request $request){
        $data = $request->except('_token');
        if(Auth::attempt($data)){
            $this->authorize('customer');
            $request->session()->flash('login', 'Đăng nhập thành công');
            return redirect('');
        }else{
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
            'link' => 'http://doanweb1234.com/'.$res->input('email'),
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
            return redirect::to('http://doanweb1234.com/');
        }else{
            return redirect()->back();
        }
    }
}
