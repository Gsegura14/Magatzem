<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $table = 'tipo';
    
    //Relación de uno a muchos->
    public function productos(){
        return $this->hasMany('App\Models\Producto');
    }
}
