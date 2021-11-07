<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOferta extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'producto_id',
        'talla_id',
        'sku',
        'codigo',
        'pedido',
        'vendido',
        'stock',
        'created_at',
        'updated_at',
        'precio_oferta',
        'aceptar'

];
public function talla(){
return $this->belongsTo('App\Models\Talla');
}
public function producto(){
return $this->belongsTo('App\Models\Producto');
}

public function cabeceracampaniaoferta()
{
    return $this->belongsTo('App\Models\CabeceraCampaniaOferta');
}





}
