<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
     protected $table = 'quanhuyen';
    protected $primaryKey = 'QH_id';
    public $timestamps = false;
    protected $fillable = [
         'QH_id ','QH_Ten','QH_Loai', 'TP_id' 
    ];

}
