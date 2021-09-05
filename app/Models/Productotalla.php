<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Productotalla extends Model
{
    use HasFactory;
    protected $table = 'producto_talla';
public function producto(){
    return $this->HasMany('App\Models\Producto');
}

public function talla(){
    return $this->HasMany('App\Models\Talla');
}
    
}
