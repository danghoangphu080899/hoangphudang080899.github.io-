<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'nhanvien';
    protected $primaryKey = 'idNhanVien';
    public $timestamps = false;
    protected $fillable = [
         'idNhanVien ','HoTen','NgaySinh', 'GioiTinh','SoDienThoai'
    ];
    public function taikhoan()
    {
    	return $this->belongsTo('App\taikhoan','id');
    }
    public function phieudathang()
    {
    	return $this->hasMany('App\PhieuDatHang','idNhanVien');
    }
}
