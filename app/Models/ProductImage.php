<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected  $fillable = ['product_id','url','cover_page'];

    public function add($productImage){
        return $this->create($productImage);
    }
}
