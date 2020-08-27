<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = 'visitas';
    protected $fillable = ['user_id','tienda_id','terminado'];

    public function tienda()
    {
        return $this->belongsTo(Store::class,'tienda_id','id');
    }
}
