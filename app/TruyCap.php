<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruyCap extends Model
{
    public $timestamps = false;
    protected $table = 'truycap';
    protected $primaryKey = 'idTruyCap';
    protected $fillable = [
         'idTruyCap', 'IP','NgayTruyCap'
    ];
}
