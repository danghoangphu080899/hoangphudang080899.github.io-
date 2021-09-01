<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
     protected $table = 'danhgia';
     protected $primaryKey = 'idDanhGia';

    protected $fillable = [
         'idDanhGia','idSanPham', 'idKhachHang','SoSao','MucDanhGia'
    ];
    public function sanpham()
    {
    	return $this->belongsto('App\sanpham','idSanPham');
    }
    public function khachhang()
    {
    	return $this->belongsto('App\KhachHang','idKhachHang');
    }

}
