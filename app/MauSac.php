<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MauSac extends Model
{
    protected $table = 'mausac';
	protected $primaryKey = 'idMauSac';
    protected $fillable = [
         'idMauSac', 'TenMau'
    ];
    public function sanpham()
    {
    	return $this->belongstoMany('App\SanPham','mausac_sanpham','idMauSac','idSanPham');
    }
}
