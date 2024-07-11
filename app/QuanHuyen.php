<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    public $timestamp = false;
    protected $fillable = ['name_quanhuyen','type','matp'];
    protected $primaryKey = 'maqh';
    protected $table = 'tbl_quanhuyen';
}
