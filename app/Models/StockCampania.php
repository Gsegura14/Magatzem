<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCampania extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'producto_id',
        'talla_id',
        'sku',
        'codigo',
        'stock',
        'created_at',
        'updated_at',
        'precio_oferta',

];
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
