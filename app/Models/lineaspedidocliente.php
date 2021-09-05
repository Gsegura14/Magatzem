<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lineaspedidocliente extends Model
{
    use HasFactory;

    public function productotalla(){
        return $this->belongsTo('App\Models\Productotalla');
    }
}
