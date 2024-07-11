<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinhThanh extends Model
{
    public $timestamp = false;
    protected $fillable = ['name_tinhthanh','type'];
    protected $primaryKey = 'matp';
    protected $table = 'tbl_tinhthanhpho';
}
