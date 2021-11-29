<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCampania extends Model
{
    use HasFactory;

    public function cabeceraCampanias(){
        return $this->belongsTo('App\Models\CabeceraCampania');
    }
}
