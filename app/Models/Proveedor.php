<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    
    protected $table = 'proveedores';
    use HasFactory;

    // Relación de uno a uno
    public function marca(){
        return $this->belongsTo('App\Models\Marca');
}
    // Relación de uno a muchos('inversa)
    public function cabecera(){
        return $this->hasOne('App\Models\Cabeceraproveedores');
    }
}
