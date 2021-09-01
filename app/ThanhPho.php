<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhPho extends Model
{
    protected $table = 'thanhpho';
    protected $primaryKey = 'TP_id';
    public $timestamps = false;
    protected $fillable = [
         'TP_id ','TP_Ten','TP_Loai'
    ];

}
