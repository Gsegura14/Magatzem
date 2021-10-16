<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    // Relación de uno a muchos('inversa)
    public function Cabeceracliente(){
        return $this->hasOne('App\Models\CabeceraCliente');
    }

    public function CabeceraCampaniaOferta(){
        return $this->hasOne('App\Models\CabeceraCampaniaOferta');
    }
}
