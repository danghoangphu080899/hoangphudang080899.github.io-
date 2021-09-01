<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuocTinh extends Model
{
    protected $table = 'thuoctinh';
    protected $primaryKey = 'idThuocTinh';
    protected $fillable = [
         'idThuocTinh', 'TenThuocTinh','idDanhMuc',
    ];

    public function danhmuc()
    {
    	return $this->belongsTo('App\DanhMucSanPham','idDanhMuc');
    }
    public function giatrithuoctinh()
    {
    	return $this->hasMany('App\GiaTriThuocTinh','idThuocTinh');
    }
}
