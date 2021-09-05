<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabeceraCliente extends Model
{
    use HasFactory;
    // Relación de uno a uno
    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
}


}
