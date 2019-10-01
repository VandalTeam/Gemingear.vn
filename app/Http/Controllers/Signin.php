<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Signin extends Controller
{
    public function Logout(){
        Auth::logout();
        return view('admin.template.signin_template');
    }
    public function Login(Request $request){
        $data = $request->except('_token');
        if(Auth::attempt($data)){
            $request->session()->flash('login', 'Đăng nhập thành công');
            return redirect('/admin/category');
        }else{
            $request->session()->flash('fail', 'Đăng nhập thất bại');
            return redirect()->back();
        }
    }
}
