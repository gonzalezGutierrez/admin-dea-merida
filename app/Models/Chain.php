<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chain extends Model
{
    protected $table = 'chains';
    protected $fillable = ['nombre','estatus'];

    public function scopeGetChains($query,$status)
    {
        return $query->getChainsWithStatus($status)->orderByDateDesc();
    }
    public function scopeGetChainsWithStatus($query,$status)
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
    public function getChainWithId($idBrand){
        return $this->findOrFail($idBrand);
    }
    public function add($chain){
        return $this->create($chain);
    }
    public function edit($chain){
        return $this->fill($chain)->save();
    }
    public function inactive(){
        return $this->fill(['estatus'=>'inactivo'])->save();
    }
    public function ChaintDelete()
    {
        return $this->delete();
    }
}
