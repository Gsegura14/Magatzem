<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CabeceraCampaniaOferta;
class CabeceraCampaniaOfertaController extends Controller
{
    
    public function index(){
        $ofertas = CabeceraCampaniaOferta::all();
        return view('admin.oferta.index',compact('ofertas'));
    }
    
    
    public function crearOferta(){
        return view('admin.oferta.nueva');
    }
    public function frmOferta($ofertaId){
        return view('admin.oferta.crear',compact('ofertaId'));
    }

    public function delete(CabeceraCampaniaOferta $ofertaId){

        $ofertaId->delete();
        return redirect()->route('index.ofertas');
    }

    
}
