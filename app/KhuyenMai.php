<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    public $timestamp = false;
    protected $fillable = ['name_mgg','code_mgg','soluong_mgg','tinhnang_mgg','tiengiam_mgg', 'time_mgg'];
    protected $primaryKey = 'id_mgg';
    protected $table = 'khuyen_mais';
}
