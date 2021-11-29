<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class histPoOrders extends Model
{
    use HasFactory;

    protected $fillable = [
        'po_order',
        'campania_id'
    ];
    public function pedidoscampania(){
        return $this->hasMany('App\Models\PedidosCampania');
    }
}
