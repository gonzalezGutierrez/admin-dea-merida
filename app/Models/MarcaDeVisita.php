<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarcaDeVisita extends Model
{
    protected $table = 'marcas_visitas';
    protected $fillable = ['marca_id','visita_id'];
}
