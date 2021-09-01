<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucSanPham extends Model
{
    protected $table = 'danhmucsanpham';
    protected $primaryKey = 'idDanhMuc';
    public $timestamps = false;
    protected $fillable = [
         'idDanhMuc', 'TenDanhMuc','MoTa',
    ];
    // public function danhmuccon()
    // {
    // 	return $this->hasMany('App\DanhMucCon','idDanhMuc');
    // }
    public function sanpham()
    {
        return $this->hasMany('App\SanPham','idDanhMuc');
    }
    public function thuoctinh()
    {
    	return $this->hasMany('App\ThuocTinh','idDanhMuc');
    }
}
