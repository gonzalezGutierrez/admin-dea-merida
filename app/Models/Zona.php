<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'zonas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','estatus'];

    public function scopeGetZonas($query,$status){
        return $query->getZonasWithStatus($status)->orderWithDateDesc();
    }
    public function scopeGetZonasWithStatus($query,$status){
        return $query->where('estatus',$status);
    }
    public function scopeOrderWithDateDesc($query){
        return $query->orderBy('created_at','desc');
    }
    public function getZonaWithId($idZona){
        return $this->findOrFail($idZona);
    }
    public function add($zona){
        return $this->create($zona);
    }
    public function edit($zona){
        return $this->fill($zona)->save();
    }
    public function inactive(){
        return $this->fill(['estatus'=>'inactivo'])->save();
    }
    public function zonaDelete(){
        return $this->delete();
    }
}
