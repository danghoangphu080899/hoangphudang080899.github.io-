<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiamGia extends Model
{
   protected $table = 'giamgia';
    protected $primaryKey = 'idGiamGia';
    public $timestamps = false;
    protected $fillable = [
         'idGiamGia', 'TenGiamGia','SoLuongMa','LuotGiamGia','DieuKien'
    ];
}

