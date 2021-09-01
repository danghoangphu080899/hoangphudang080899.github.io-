<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaTriThuocTinh extends Model
{
    protected $table = 'giatrithuoctinh';
    protected $primaryKey = 'idThuocTinh';
    public $timestamps = false;
    protected $fillable = [
         'idThuocTinh', 'GiaTri','idDonViGiaTri'
    ];

    public function thuoctinh()
    {
    	return $this->belongsTo('App\ThuocTinh','idThuocTinh');
    }
    public function donvitinh()
    {
    	return $this->belongsTo('App\DonViTinh','idDonViGiaTri');
    }
    public function sanpham()
    {
       return $this->belongsTo('App\SanPham','idSanPham');
    }

}
