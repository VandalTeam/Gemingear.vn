<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Signin extends Controller
{
    public function Logout(){
        Auth::logout();
        return view('admin.template.signin_template');
    }
    public function Login(Request $request,User $model){

        $data = $request->except('_token');
        $user=$model->where('name',$data['name'])->get()->toArray();
        if(Auth::attempt($data)){
            $request->session()->flash('login', 'Đăng nhập thành công');
            return view('admin.template.admin_template',['user'=>$user[0]]);
        }else{
            $request->session()->flash('fail', 'Đăng nhập thất bại');
            return redirect()->back();
        }
    }
    }

