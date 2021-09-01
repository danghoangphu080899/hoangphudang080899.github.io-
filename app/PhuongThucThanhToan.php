<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhuongThucThanhToan extends Model
{
    protected $table = 'phuongthucthanhtoan';
    protected $primaryKey = 'idPhuongThucThanhToan';
    protected $fillable = [
         'idPhuongThucThanhToan', 'TenPhuongThucThanhToan','MoTa'
    ];
    public function phieudathang()
    {
    	$this->hasMany('App\PhieuDatHang','idPhuongThucThanhToan');
    }

}
