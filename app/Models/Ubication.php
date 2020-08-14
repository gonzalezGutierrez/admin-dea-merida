<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    protected $table = 'ubications';
    protected $fillable = ['latitud','longitud'];

    public function getUbicationWithId($idUbication){
        return $this->findOrFail($idUbication);
    }
    public function add($Ubication){
        return $this->create($Ubication);
    }
    public function edit($Ubication){
        return $this->fill($Ubication)->save();
    }
    public function inactive(){
        return $this->fill(['estatus'=>'inactivo'])->save();
    }
    public function productDelete()
    {
        return $this->delete();
    }
}
