<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khachhang';
    protected $primaryKey = 'idKhachHang';
    public $timestamps = false;
    protected $fillable = [
         'idKhachHang ','HoTen','NgaySinh', 'SoDienThoai','id'
    ];
    public function taikhoan()
    {
    	return $this->belongsTo('App\taikhoan','id');
    }
    public function diachi()
    {
    	return $this->hasMany('App\DiaChi','idKhachHang');
    }
    public function yeuthich()
    {
        return $this->hasMany('App\YeuThich','idKhachHang');
    }
    public function phieudathang()
    {
        return $this->hasMany('App\PhieuDatHang','idKhachHang');
    }
    public function danhgia()
    {
        return $this->hasMany('App\DanhGia','idKhachHang');

    }
    public function binhluan()
    {
        return $this->hasMany('App\BinhLuan','idKhachHang');

    }
}
