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
}
