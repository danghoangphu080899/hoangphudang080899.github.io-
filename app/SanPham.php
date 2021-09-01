<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{

	protected $table = 'sanpham';
	protected $primaryKey = 'idSanPham';
    public $timestamps = false;
    protected $fillable = [
         'idSanPham', 'TenSanPham','idDanhMucCon','Gia','SoLuongHang','SoLuongBan','idNhaSanXuat','MoTaNgan','MoTaChiTiet','LuotXem','TrangThai'
    ];
    public function hinhanh()
    {
    	return $this->hasMany('App\HinhAnh','idSanPham');
    }
    public function hinhanh3d()
    {
        return $this->hasMany('App\HinhAnh3D','idSanPham');
    }
    //  public function danhmuccon()
    // {
    //     return $this->belongsTo('App\DanhMucCon','idDanhMucCon');
    // }
    public function danhmucsanpham()
    {
        return $this->belongsTo('App\DanhMucSanPham','idDanhMuc');
    }


    public function nhasanxuat()
    {
        return $this->belongsTo('App\NhaSanXuat','idNhaSanXuat');
    }
    public function chitietphieudathang()
    {
        return $this->hasMany('App\ChiTietPhieuDatHang','idSanPham');
    }
    public function yeuthich()
    {
        return $this->hasMany('App\YeuThich','idSanPham');
    }
    public function giatrithuoctinh()
    {
        return $this->hasMany('App\GiaTriThuocTinh','idSanPham');
    }
    public function mausac()
    {
        return $this->belongstoMany('App\MauSac','mausac_sanpham','idSanPham','idMauSac');
    }
    public function danhgia()
    {
        return $this->hasMany('App\DanhGia','idSanPham');
    }


}
