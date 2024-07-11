<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XaPhuong extends Model
{
    public $timestamp = false;
    protected $fillable = ['name_xaphuong','type','maqh'];
    protected $primaryKey = 'xaid';
    protected $table = 'tbl_xaphuongthitran';
}
