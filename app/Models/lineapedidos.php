<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lineapedidos extends Model
{
    protected $table = 'lineapedidos';
    use HasFactory;

    public function talla(){
        return $this->belongsTo('App\Models\Talla');
    }
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
}
