<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_model extends ModelSetting
{
    //
    protected $table = 'menu';
<<<<<<< HEAD
    public $timestamps = false;
=======
    protected $fillable = ['name','url','subcategory_id'];
    public $timestamps = false;
    public function join($where){
        return $this->leftJoin('subcategory', 'subcategory.id', '=', 'menu.subcategory_id')
        ->where($where)
        ->select('menu.*','subcategory.name as name_subcategory')->get();
    }
>>>>>>> Ben_DevPHP
}
