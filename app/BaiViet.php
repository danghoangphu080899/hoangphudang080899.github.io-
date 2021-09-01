<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    public $timestamps = false;
    protected $table = 'baiviet';
    protected $primaryKey = 'idBaiViet';
    protected $fillable = [
         'idBaiViet', 'TieuDeBaiViet','NoiDungNgan','NoiDungChiTiet','HinhAnh','TrangThai','idDanhMucBaiViet','idNhanVien'
    ];
    public function danhmucbaiviet()
    {
        return $this->belongsTo('App\DanhMucBaiViet','idDanhMucBaiViet');
    }
    public function nhanvien()
    {
        return $this->belongsTo('App\NhanVien','idNhanVien');
    }
    public function binhluan()
    {
        return $this->hasMany('App\BinhLuan','idBaiViet');
    }
}
