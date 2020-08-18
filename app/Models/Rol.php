<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected  $table = 'roles';

    public static function promotor(){
        return Rol::where('nombre','promotor')->first();
    }
}
