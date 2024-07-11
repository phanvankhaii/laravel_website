<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhiShip extends Model
{
    public $timestamp = false;
    protected $fillable = ['matinhthanh','maquanhuyen','maxaphuong','tienphi'];
    protected $primaryKey = 'id_phiship';
    protected $table = 'tbl_phiship';

    public function tinhthanh(){
        return $this->belongsTo('App\TinhThanh','matinhthanh');
    }

    public function quanhuyen(){
        return $this->belongsTo('App\QuanHuyen','maquanhuyen');
    }

    public function xaphuong(){
        return $this->belongsTo('App\XaPhuong','maxaphuong');
    }
}
