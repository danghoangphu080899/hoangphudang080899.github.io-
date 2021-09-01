<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'taikhoan';
    public $timestamps = false;
    protected $fillable = [
        'id','email','provider', 'provider_id','email_verified_at', 'password', 'avatar','FacebookLink', 'ChucVu','TrangThai','email_verified_code'
    ];
 
   public function khachhang()
    {
        return $this->hasOne('App\KhachHang','id');
    }
    public function nhanvien()
    {
        return $this->hasOne('App\NhanVien','id');
    }







    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
