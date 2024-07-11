<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
     public $timestamp = false;
    protected $fillable = [
        'order_code','product_id','product_name','product_gia','product_sale_quantily','magiamgia','phivanchuyen'];
    protected $primaryKey = 'order_detail_id ';
    protected $table = 'tbl_order_detail';
}
