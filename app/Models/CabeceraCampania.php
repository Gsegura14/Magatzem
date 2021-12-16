<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabeceraCampania extends Model
{
    use HasFactory;
    protected $fillable = ['estado_id'];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function estado(){
        return $this->belongsTo('App\Models\EstadoCampania');
    }
}
