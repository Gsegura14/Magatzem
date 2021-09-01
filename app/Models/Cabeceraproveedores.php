<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabeceraproveedores extends Model
{
    protected $table = 'cabeceraproveedores';
   
    use HasFactory;

    // Relación de uno a uno
    public function proveedor(){
        return $this->belongsTo('App\Models\Proveedor');
    }
}
