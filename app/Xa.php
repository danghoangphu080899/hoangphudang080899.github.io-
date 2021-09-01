<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xa extends Model
{
     protected $table = 'xa';
    protected $primaryKey = 'X_id';
    public $timestamps = false;
    protected $fillable = [
         'X_id ','X_Ten','X_Loai', 'QH_id'
    ];
    public function quanhuyen()
    {
        return $this->belongsTo('App\QuanHuyen','QH_id');
    }
}
