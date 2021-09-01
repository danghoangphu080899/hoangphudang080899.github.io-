<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    protected $table = 'donvitinh';
    protected $primaryKey = 'idDonViGiaTri';
    protected $fillable = [
         'idDonViGiaTri', 'TenDonVi','VietTat',
    ];

    public function giatrithuoctinh()
    {
    	return $this->hasOne('App\GiaTriThuocTinh','idDonViGiaTri');
    }

}
