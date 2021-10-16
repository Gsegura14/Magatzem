<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
class CabeceraCampaniaOfertaController extends Controller
{
    public function crearOferta(){
        return view('admin.oferta.nueva');
    }
}
