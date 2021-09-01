<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    protected $table = 'hinhanh';
	protected $primaryKey = 'idHinhAnh';
    protected $fillable = [
         'idHinhAnh', 'src','idSanPham'
    ];
    public $timestamps = false;
    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','idSanPham');
    }
}
