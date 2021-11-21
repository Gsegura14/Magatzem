<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaMercancia extends Model
{
    use HasFactory;

    public function proveedor(){
        return $this->belongsTo('App\Models\Proveedor');
    }

    public function lineapedido(){
        return $this->belongsTo('App\Models\lineaspedidos');
    }

    public function pedido(){
        return $this->belongsTo('App\Models\CabeceraProveedores');
    
    }


}
