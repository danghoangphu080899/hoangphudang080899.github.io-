<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
     protected $table = 'binhluan';
    protected $primaryKey = 'idBinhLuan';
    protected $fillable = [
         'idBinhLuan', 'NoiDung','idBaiViet','idKhachHang'
    ];
    public function baiviet()
    {
        return $this->belongsTo('App\BaiViet','idBaiViet');
    }
    public function khachhang()
    {
        return $this->belongsTo('App\KhachHang','idKhachHang');
    }
}
