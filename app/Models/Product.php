<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['nombre','estatus','brand_id','codigo','slug'];

    public function marca(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function scopeGetProducts($query,$status)
    {
        return $query->getProductsWithStatus($status)->orderByDateDesc();
    }
    public function scopeGetProductsWithStatus($query,$status)
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
    public function getProductWithId($idUser){
        return $this->findOrFail($idUser);
    }
    public function add($product){
        return $this->create($product);
    }
    public function edit($product){
        return $this->fill($product)->save();
    }
    public function inactive(){
        return $this->fill(['estatus'=>'inactivo'])->save();
    }
    public function productDelete()
    {
        return $this->delete();
    }
}
