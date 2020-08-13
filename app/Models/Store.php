<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = ['nombre','estatus','chain_id','zona_id','numero_tienda'];

    public function cadena(){
        return $this->belongsTo(Chain::class,'chain_id');
    }
    public function zona(){
        return $this->belongsTo(Zona::class,'zona_id');
    }

    public function scopeGetStores($query,$status)
    {
        return $query->getStorsWithStatus($status)->orderByDateDesc();
    }
    public function scopeGetStorsWithStatus($query,$status)
    {
        return $query->where('estatus',$status);
    }
    public  function scopeOrderByDateDesc($query)
    {
        return $query->orderBy('created_at','desc');
    }
    public function  scopeOrderByDateAsc($query)
    {
        return $query->orderBy('created_at','asc');
    }
    public function getStoreWithId($idStore){
        return $this->findOrFail($idStore);
    }
    public function add($store){
        return $this->create($store);
    }
    public function edit($store){
        return $this->fill($store)->save();
    }
    public function inactive(){
        return $this->fill(['estatus'=>'inactivo'])->save();
    }
    public function storeDelete()
    {
        return $this->delete();
    }
}
