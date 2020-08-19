<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $table = 'keywords';
    protected $fillable = ['nombre','estatus'];


    public function scopeGetKeywords($query,$status)
    {
        return $query->getKeywordsWithStatus($status);
    }
    public function scopeGetKeywordsWithStatus($query,$status)
    {
        return $query->where('estatus',$status);
    }

    public function add($keywords){
        return $this->create($keywords);
    }
    public function edit($keywords){
        return $this->fill($keywords)->save();
    }

}
