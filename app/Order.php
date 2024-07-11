<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamp = false;
    protected $fillable = ['customer_id','donhang_id','order_status','order_code'];
    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';
}
