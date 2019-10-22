<?php

namespace App\Http\Controllers;

use App\Menu_model;
use App\Product_model;
use Illuminate\Http\Request;
use DateTime;
use App\Subcategory_model;
class Products extends Controller
{
    public function __construct()
    {
        $this->model = new Product_model();
    }
    public function index(){
        $data = $this->model->getfullInfo();
        return view('admin.products',['Product'=>$data]);
    }
    public function new(){
        return view('admin.newProduct',['method'=>'insert']);
    }
    public function loadsub(Request $res, Subcategory_model $model,Menu_model $MenuModel)
    {
        $where = $res->except('_token');
        $data = $model->where($where)->get()->toArray();
        $option="";
        
        for($i=0;$i<count($data);$i++)
        {
            $option=$option."<optgroup  label='".$data[$i]['name']."'>";
            $Menu=$MenuModel->where('subcategory_id',$data[$i]['id'])->get()->toArray();
            for($j=0;$j<count($Menu);$j++)
            {
                $option=$option."<option value='".$Menu[$j]['id']." ".$data[$i]['id']."'>".$Menu[$j]['name']."</option>";
            }
        }

        echo $option;
    }
    public function edit($id,Subcategory_model $Submodel,Menu_model $MeModel){
        $where = array('id'=>$id);
        $data = $this->model->getInfo($where)->toArray();
        $Sub=$Submodel->getInfo(array('id'=>$data[0]->subcategory_id))->toArray();
        $Menu=$MeModel->getInfo(array('subcategory_id'=>$data[0]->subcategory_id))->toArray();
        return view('admin.newProduct',['products'=>$data[0],'method'=>'update/'.$id,'Sub'=>$Sub[0],'Menu'=>$Menu]);
     
    }
    public function insert(Request $res){
        $id=explode(" ",$res->menu_id);
        $data = array('name'=>$res->name,'category_id'=>$res->category_id,'subcategory_id'=>$id[1],'menu_id'=>$id[0],'description'=>$res->description,'price'=>$res->price,'sale_price'=>$res->sale_price,'date_start'=>$res->date_start,'date_end'=>$res->date_end,'instock'=>$res->instock,'image1'=>$res->image1);
        $data = $data + array('url'=>to_slug($res['name']));
        status($res,$this->model->insertInfo($data));
        $data1 = $this->model->getfullInfo();
        return view('admin.products',['Product'=>$data1]);
    }
    public function delete(Request $res,$id){
        $where = array('id'=>$id);
        status($res,$this->model->deleteInfo($where));
        return redirect($_SERVER['HTTP_REFERER']);
         
    }
    public function update(Request $res,$id){
        $where = array('id'=>$id);
        $id=explode(" ",$res->menu_id);
        $data = array('name'=>$res->name,'category_id'=>$res->category_id,'subcategory_id'=>$id[1],'menu_id'=>$id[0],'description'=>$res->description,'price'=>$res->price,'sale_price'=>$res->sale_price,'date_start'=>$res->date_start,'date_end'=>$res->date_end,'instock'=>$res->instock,'image1'=>$res->image1);
        status($res,$this->model->updateInfo($where,$data));
        $data1 = $this->model->getfullInfo();
        return view('admin.products',['Product'=>$data1]);
    }
}
