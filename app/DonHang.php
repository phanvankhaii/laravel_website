<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    public $timestamp = false;
    protected $fillable = ['donhang_name','donhang_email','donhang_diachi','donhang_phone','phuongthucthanhtoan'];
    protected $primaryKey = 'donhang_id';
    protected $table = 'tbl_donhang';
}
