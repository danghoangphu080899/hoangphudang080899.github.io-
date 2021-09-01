<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class YeuThich extends Model
{	
	public $timestamps = false;
    protected $table = 'yeuthich';
    protected $primaryKey = ['idKhachHang', 'idSanPham'];
    public $incrementing = false;
    protected $fillable = [
         'idKhachHang ','idSanPham'
    ];
    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','idSanPham');
    }
    public function khachhang()
    {
    	return $this->belongsTo('App\KhachHang','idKhachHang');
    }
    
    /**
 * Set the keys for a save update query.
 *
 * @param  \Illuminate\Database\Eloquent\Builder  $query
 * @return \Illuminate\Database\Eloquent\Builder
 */
protected function setKeysForSaveQuery(Builder $query)
{
    $keys = $this->getKeyName();
    if(!is_array($keys)){
        return parent::setKeysForSaveQuery($query);
    }

    foreach($keys as $keyName){
        $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
    }

    return $query;
}

/**
 * Get the primary key value for a save query.
 *
 * @param mixed $keyName
 * @return mixed
 */
protected function getKeyForSaveQuery($keyName = null)
{
    if(is_null($keyName)){
        $keyName = $this->getKeyName();
    }

    if (isset($this->original[$keyName])) {
        return $this->original[$keyName];
    }

    return $this->getAttribute($keyName);
}

}