<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_model extends ModelSetting
{
    //
    protected $table = 'menu';
    protected $fillable = ['name','url','subcategory_id'];
    public $timestamps = false;
}
