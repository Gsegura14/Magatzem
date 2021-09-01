<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    use HasFactory;

    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
}

public function lineapedidos(){
    return $this->belongsTo('App\Models\lineapedidos');
}
}
