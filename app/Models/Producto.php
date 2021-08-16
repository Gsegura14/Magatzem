<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    // Relación de uno a muchos (Inversa)
    public function marca(){
            return $this->belongsTo('App\Models\Marca');
    }
    public function tipo(){
            return $this->belongsTo('App\Models\Tipo');
    }

    // Relación de muchos a muchos
    public function tallas(){
            return $this->belongsToMany('App\Models\Talla');
    }

    // Relación de uno a uno
    public function imagen(){
            return $this->hasOne('App\Models\Imagen');
    }
}
