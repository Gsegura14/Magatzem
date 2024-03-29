<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosCampania extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'campania_id',
        'po_number_id',
        'producto_id',
        'talla_id',
        'sku',
        'codigo',
        'pedido',
        'servido',
        'precio_oferta',
        'n_order',
        'enviado',
        'created_at',
        'updated_at'

];
public function poorders(){
    return $this->belongsTo('App\Models\PoOrders');
}
public function talla(){
return $this->belongsTo('App\Models\Talla');
}
public function producto(){
return $this->belongsTo('App\Models\Producto');
}

public function cabeceracampania()
{
    return $this->belongsTo('App\Models\CabeceraCampania');
}
}


