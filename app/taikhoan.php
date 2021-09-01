<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taikhoan extends Model 
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'taikhoan';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
         'id','email','provider', 'provider_id','email_verified_at', 'password', 'avatar','FacebookLink', 'ChucVu','TrangThai','email_verified_code'

    ];
     public function nhanvien()
    {
        return $this->hasOne('App\NhanVien','id');
    }
    public function khachhang()
    {
        return $this->hasOne('App\KhachHang','id');
    }

        protected $hidden = [
        'password', 'remember_token', 
    ];
}
