<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','estatus'];

    public function zonas(){
        return $this->belongsToMany(Zona::class, 'groups_zonas','grupo_id');
    }

    public function scopeGetGroups($query,$status){
        return $query->getGroupWithStatus($status)->orderWithDateDesc();
    }
    public function scopeGetGroupWithStatus($query,$status){
        return $query->where('estatus',$status);
    }
    public function scopeOrderWithDateDesc($query){
        return $query->orderBy('created_at','desc');
    }
    public function getGroupWithId($idGroup){
        return $this->findOrFail($idGroup);
    }
    public function add($group){
        return $this->create($group);
    }
    public function edit($group){
        return $this->fill($group)->save();
    }
    public function inactive(){
        $this->fill(['estatus'=>'inactivo'])->save();
    }
    public function grupoDelete(){
        return $this->delete();
    }
}
