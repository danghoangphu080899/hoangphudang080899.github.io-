<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrangThaiDatHang extends Model
{
    protected $table = 'trangthaidathang';
    protected $primaryKey = 'idTrangThai';
    protected $fillable = [
         'idTrangThai', 'TenTrangThai','MoTa'
    ];
    public function phieudathang()
    {
    	$this->hasMany('App\PhieuDatHang','idTrangThai');
    }
}
