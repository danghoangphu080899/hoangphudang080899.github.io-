<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucCon extends Model
{
   protected $table = 'danhmuccon';
   protected $primaryKey = 'idDanhMucCon';
    protected $fillable = [
         'idDanhMucCon', 'TenDanhMucCon','idDanhMuc',
    ];
    public function sanpham()
    {
    	return $this->hasMany('App\SanPham','idDanhMucCon');
    }
    public function danhmucsanpham()
    {
    	return $this->belongsTo('App\DanhMucSanPham','idDanhMuc');
    }

}
