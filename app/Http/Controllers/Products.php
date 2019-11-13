<?php

namespace App\Http\Controllers;


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
    public function loadsub(Request $res, Subcategory_model $model)
    {
        $where = $res->except('_token');
        $data = $model->where($where)->get()->toArray();
        $option="";
        
        for($i=0;$i<count($data);$i++)
        {
            $option=$option."<option  value='".$data[$i]['id']."'>".$data[$i]['name']."</option>";
        }
        echo $option;
    }
    public function edit($id,Subcategory_model $Submodel){
        $where = array('id'=>$id);
        $data = $this->model->getInfo($where)->toArray();
        $subfull=$Submodel->getInfo()->toArray();
        $Sub=$Submodel->getInfo(array('id'=>$data[0]->subcategory_id))->toArray();
        return view('admin.newProduct',['products'=>$data[0],'method'=>'update/'.$id,'Sub'=>$Sub[0],'Subfull'=>$subfull]);
     
    }
    public function insert(Request $res){
        $data = array('name'=>$res->name,'subcategory_id'=>$res->subcategory_id,'description'=>$res->description,'promotion_id'=>$res->promotion_id,'brand_id'=>$res->brand_id,'price'=>$res->price,'in_stock'=>$res->instock,'img_link'=>$res->image1);
        $data = $data + array('url'=>to_slug($res['name']));
        
        echo "<pre>";
        print_r ($data);
        echo "</pre>";
        die;
        status($res,$this->model->insertInfo($data));
        return redirect('admin/Products');
    }
    public function delete(Request $res,$id){
        $where = array('id'=>$id);
        status($res,$this->model->deleteInfo($where));
        return redirect('admin/Products');
         
    }
    public function update(Request $res,$id){
        $where = array('id'=>$id);
        $data = array('name'=>$res->name,'subcategory_id'=>$res->subcategory_id,'promotion_id'=>$res->promotion_id,'brand_id'=>$res->brand_id,'price'=>$res->price,'in_stock'=>$res->instock,'img_link'=>$res->image1);
        status($res,$this->model->updateInfo($where,$data));
        $data1 = $this->model->getfullInfo();
        return redirect('admin/Products');
    }
}
