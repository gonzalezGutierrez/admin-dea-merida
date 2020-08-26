<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitForm extends Model
{
    protected $table = 'visit_forms';
    protected $fillable = ['product_id','visita_id','exhibido','agotado','cumple_panorama','tiene_promocion','cuenta_con_exhibicion_adicional','frentes',
    'inventario','en_transito','fecha_caducidad','precio_piso_venta','comentarios','tiene_promocion_texto','exhibicion_adicional_text'];
    
}
