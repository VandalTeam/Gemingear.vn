<?php

namespace App\Http\Controllers;

use App\Order_model;
use Illuminate\Http\Request;
use DB;
class Order extends Controller
{
    //
    protected $model;
    public function __construct()
    {
        $this->model = new Order_model();
    }
    
    public function index(Request $res){
        $data = $this->model->getInfo();
        return view('admin.order',['order'=>$data]);
    }
    public function insert(Request $res){
        $data = $res->except('_token');
        $data = $data ;
        status($res,$this->model->create($data));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function edit(Request $res){
        $where = $res->except('_token');
        $data = $this->model->where($where)->get();
        echo json_encode($data);
    }
    public function delete(Request $res,$id){
        status($res,$this->model->destroy($id));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function update(Request $res,$id){
        $where = array('id'=>$id);
        $data = $res->except('_token');
        status($res,$this->model->updateInfo($where,$data));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function statistics(){
        return view('admin.Statistial');
    }
    public function statisticsWithYear(Request $res){
        $data=DB::table('orders')->where(DB::raw("YEAR(created_at)"),'=',$res->year) ->groupBy(DB::raw("Month(created_at)"))->select(DB::raw('SUM(total) as DoanhThu,Month(created_at) as month'))->get();
        echo $data;
    }

}
