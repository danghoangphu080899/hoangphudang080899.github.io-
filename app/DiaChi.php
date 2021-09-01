<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaChi extends Model
{
    protected $table = 'diachi';
    protected $primaryKey = 'idDiaChi';
    public $timestamps = false;
    protected $fillable = [
         'idDiaChi ','idKhachHang','DiaChi'
    ];
    public function khachhang()
    {
    	return $this->belongsTo('App\KhachHang','idKhachHang');
    }
}
