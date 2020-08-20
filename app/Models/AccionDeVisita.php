<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccionDeVisita extends Model
{
    protected $table = 'acciones_tiendas';
    protected $fillable = ['accion_id','visita_id'];
}
