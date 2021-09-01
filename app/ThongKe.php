<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongKe extends Model
{
	public $timestamps = false;
    protected $table = 'thongke';
    protected $primaryKey = 'idThongKe';
    protected $fillable = [
         'idThongKe', 'Ngay','SoLuong','TongTien','TongDonHang'
    ];
    
}
