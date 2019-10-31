<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class Users extends Controller
{
    public $timestamps = false;
    public function index(User $model){
       $data=$model->all();
       return view('admin.users',['Users'=>$data]);
    }
    public function insert(Request $res,User $model){
        $data = $res->except('_token'); 
        $object= (object)$data;
        $model->name=$object->name;
        $model->email=$object->email;
        $model->password=bcrypt($object->password);
        $model->role=$object->role;
        $model->save();
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function edit(Request $res,User $model){
        $data = $model->where('id',$res->id)->get()->toArray();
        echo json_encode($data);
    }
    public function update(Request $res,$id,User $model){
        $data = $res->except('_token');
        $user=$model->find($id);
        $object= (object)$data;
        $user->name=$object->name;
        $user->email=$object->email;
        $user->password=bcrypt($object->password);
        $model->role=$object->role;
        $user->save();
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete(Request $res,$id,User $model){
        status($res,$model->destroy($id));
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
