<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu_model;
use App\Subcategory_model;
use App\Category_model;

class Menu extends Controller
{
    protected $model,$subcategory;
    public function __construct()
    {
        $this->model = new Menu_model();
        $this->subcategory = new Subcategory_model();
        $this->category = new Category_model();
    }
    

    public function index($url,$uri){
        $where = array('category.url'=>$url);
        $data = $this->model->join(array('subcategory.url'=>$uri));
        $subcategory = $this->subcategory->eloquentjoin($where)->toArray();
        $category = $this->category->getInfo()->toArray();
        $new = BenSort($subcategory,$uri,'url');
        $newcategory = BenSort($category,$url,'url');
        
        // $sub = $this->category->with('subcategory')->get()->toArray();
        return view('admin.menu',['menu'=>$data,'category'=>json_decode(json_encode($newcategory)),'subcategory'=>json_decode(json_encode($new))]);
    }
    public function insert(Request $res){
        $data = $res->except('_token');
        $data = $data + array('url'=>to_slug($res['name']));
        status($res,$this->model->insertInfo($data));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function edit(Request $res){
        $where = $res->except('_token');
        $data = $this->model->getInfo($where);
        echo json_encode($data);
    }
    public function getmenu(Request $res){
        $where = $res->except('_token');
        $data = $this->subcategory->getInfo($where);
        echo json_encode($data);
    }
    public function delete($id,Request $res){
        $where = array('id'=>$id);
        status($res,$this->model->deleteInfo($where));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function update(Request $res,$id){
        $where = array('id'=>$id);
        $data = $res->except('_token');
        status($res,$this->model->updateInfo($where,$data));
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
