<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
     protected $table = 'nhasanxuat';
	protected $primaryKey = 'idNhaSanXuat';
     public $timestamps = false;
    protected $fillable = [
         'idNhaSanXuat', 'TenNhaSanXuat','DiaChi','SoDienThoai'
    ];
    public function sanpham()
    {
    	return $this->hasMany('App\SanPham','idNhaSanXuat');
    }
}
