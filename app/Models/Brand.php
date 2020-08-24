<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['nombre','estatus','slug'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeGetBrands($query,$status)
    {
        return $query->getBrandsWithStatus($status)->orderByDateDesc();
    }
    public function scopeGetBrandsWithStatus($query,$status)
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
    public function getBrandWithId($idBrand){
        return $this->findOrFail($idBrand);
    }
    public function add($brand){
        return $this->create($brand);
    }
    public function edit($brand){
        return $this->fill($brand)->save();
    }
    public function inactive(){
        return $this->fill(['estatus'=>'inactivo'])->save();
    }
    public function productDelete()
    {
        return $this->delete();
    }
}
