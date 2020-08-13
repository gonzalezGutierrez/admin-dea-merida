<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class User extends Model
{
    protected  $table = 'users';
    protected  $primaryKey = 'id';
    protected  $fillable = ['email','password','nombre','apellido','telefono','zona_id','rol_id','estatus'];

    public function auth($credentials)
    {
        if(Auth::attempt($credentials))
            return true;
        return false;
    }
    public function logout(){
        return Auth::logout();
    }

    public function grupo()
    {
        return $this->belongsTo(Group::class,'grupo_id');
    }
    public function rol(){
        return $this->belongsTo(Rol::class,'rol_id');
    }
    public function scopeGetUsers($query,$status)
    {
        return $query->getUsersWithStatus($status)->orderByDateDesc();
    }
    public function scopeGetUsersWithStatus($query,$status)
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
    public function getUserWithId($idUser){
        return $this->findOrFail($idUser);
    }
    public function add($user){
        return $this->create($user);
    }
    public function edit($user){
        return $this->fill($user)->save();
    }
    public function inactive(){
        return $this->fill(['estatus'=>'inactivo'])->save();
    }
    public function userDelete()
    {
        return $this->delete();
    }
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

}
