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
        $data = $this->model->getInfo();
        return view('admin.Products',['Product'=>$data]);
    }
    public function new(){
        $pro= new\stdClass;
        $pro->id=0;
        $pro->name=null;
        $pro->category_id=0;
        $pro->subcategory_id=0;
        $pro->description=null;
        $pro->price=0;
        $pro->sale_price=0;
        $pro->date_start=DateTime::createFromFormat('m-d-Y', '10-16-2003')->format('Y-m-d');
        $pro->date_end=DateTime::createFromFormat('m-d-Y', '10-16-2003')->format('Y-m-d');
        $pro->image1=null;
        $pro->image2=null;
        $pro->image3=null;
        $pro->image4=null;
        $pro->image5=null;
        $pro->instock=-1;
        $pro->url=null;
        return view('admin.insertProduct',['products'=>$pro,'method'=>'insert']);
    }
    public function loadsub(Request $res, Subcategory_model $model,Menu_model $Menu)
    {
        $where = $res->except('_token');
        $data = $model->where($where)->get()->toArray();
        $option="";
        
        for($i=0;$i<count($data);$i++)
        {
            $option=$option."<optgroup label='".$data[$i]['name']."'>";
            $product=$Menu->where('subcategory_id',$data[$i]['id'])->get()->toArray();
            for($j=0;$j<count($product);$j++)
            {
                $option=$option."<option value='".$product[$i]['id']."'>".$product[$j]['name']."</option>";
            }
        }

        echo $option;
    }
    public function edit($id){
        $where = array('id'=>$id);
        $data = $this->model->getInfo($where)->toArray();
        return view('admin.insertProduct',['products'=>$data[0],'method'=>'update/'.$id]);
     
    }
    public function insert(Request $res){
        $data = $res->except('_token');
        array_splice($data, 6 ,1);
        $data = $data + array('url'=>to_slug($res['name']));
        status($res,$this->model->insertInfo($data));
        $data1 = $this->model->getInfo();
        return view('admin.Products',['Product'=>$data1]);
    }
    public function delete(Request $res,$id){
        $where = array('id'=>$id);
        status($res,$this->model->deleteInfo($where));
        return redirect($_SERVER['HTTP_REFERER']);
         
    }
    public function update(Request $res,$id){
        $where = array('id'=>$id);
        $data = $res->except('_token');
        array_splice($data, 5 ,1);
        status($res,$this->model->updateInfo($where,$data));
        $data1 = $this->model->getInfo();
        return view('admin.Products',['Product'=>$data1]);
    }
}
