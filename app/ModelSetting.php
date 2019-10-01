<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ModelSetting extends Model
{
    protected $table;
    public $timestamps;

    public function getInfo($where = null){
        if(empty($where)){
            return DB::table($this->table)->get();
        }else{
            return DB::table($this->table)->where($where)->get();
        }
    }
    public function insertInfo($data){
        return DB::table($this->table)->insert([$data]);
    }

    public function updateInfo($where,$data){
        return DB::table($this->table)->where($where)->update($data);
    }

    public function deleteInfo($where){
        return DB::table($this->table)->where($where)->delete();
    }
}
