<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoOrders extends Model
{
    use HasFactory;
    protected $fillable = [
        'po_order',
        'campania_id',
        'enviado'
    ];
    public function pedidoscampania(){
        return $this->hasMany('App\Models\PedidosCampania');
    }
}
