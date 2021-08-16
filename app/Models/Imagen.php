<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = ['url'];
    use HasFactory;

    // Relación de uno a uno

    public function producto(){
        return $this->hasOne('App\Models\Producto');
    }
}
