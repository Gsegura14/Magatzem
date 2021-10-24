<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabeceraCampaniaOferta extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad_unidades'];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

  
}
