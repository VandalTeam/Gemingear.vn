<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_model extends Model
{
    protected $table = 'orders';
    protected $fillable = ['name_customer','phone','email','address','total','status','note'];
}
