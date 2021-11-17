<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
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
                    'reservado',
                    'created_at',
                    'updated_at'

];
    public function talla(){
        return $this->belongsTo('App\Models\Talla');
    }
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
}
