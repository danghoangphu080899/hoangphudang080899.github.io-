<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuDatHang extends Model
{
    protected $table = 'phieudathang';
	protected $primaryKey = 'idPhieuDatHang';
    protected $fillable = [
         'idPhieuDatHang', 'idKhachHang','NgayDat','DiaChiGiaoHang','TongTien','idPhuongThucThanhToan','idTrangThai','idNhanVien'
    ];
    public function chitietphieudathang()
    {
    	return $this->hasMany('App\ChiTietPhieuDatHang','idPhieuDatHang');
    }
    public function khachhang()
    {
    	return $this->belongsto('App\KhachHang','idKhachHang');
    }
    public function nhanvien()
    {
        return $this->belongsto('App\NhanVien','idNhanVien');
    }
    public function trangthaidathang()
    {
    	return $this->belongsto('App\TrangThaiDatHang','idTrangThai');
    }
    public function phuongthucthanhtoan()
    {
        return $this->belongsto('App\PhuongThucThanhToan','idPhuongThucThanhToan');
    }
}
