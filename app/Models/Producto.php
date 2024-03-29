<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
            'modelo',
            'color',
            'referencia_sugerida',
            'descripcion_corta',
            'marca_id',
            'tipo_id',
            'precio_coste',
            'precio_vta',
            'made_in',
            'created_at',
            'updated_at',
            'imagen_id'
    ] ;
    
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

    public function stock(){
            return $this->hasMany('App\Models\Stock');
    }

    public function lineaclientes(){
            return $this->hasMany('App\Models\lineaspedidocliente');
    }
    public function lineaproveedores(){
        return $this->hasMany('App\Models\lineapedidos');
}
    
}
