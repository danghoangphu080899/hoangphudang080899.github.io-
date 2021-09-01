<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh3D extends Model
{
    protected $table = 'hinhanh3d';
    protected $primaryKey = 'idHinhAnh3D';
    public $timestamps = false;
    protected $fillable = [
         'idHinhAnh3D', 'src','idSanPham'
    ];
    public function sanpham()
    {
        return $this->belongsTo('App\SanPham','idSanPham');
    }
}
