<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucBaiViet extends Model
{
   public $timestamps = false;
    protected $table = 'danhmucbaiviet';
    protected $primaryKey = 'idDanhMucBaiViet';
    protected $fillable = [
         'idDanhMucBaiViet', 'TenDanhMucBaiViet','MoTaDanhMucBaiViet'
    ];
    public function baiviet()
    {
        return $this->hasMany('App\BaiViet','idDanhMucBaiViet');
    }
}
