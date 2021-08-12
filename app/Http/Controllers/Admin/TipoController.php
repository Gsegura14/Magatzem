<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    public function index(){
        $tipos = Tipo::all();
        return view('admin.productos.listaTipos',compact('tipos'));
    }

    public function guardar(Request $request){

        $request->validate([
            'nombre_tipo'=> 'required'
        ]);

        $tipo = new Tipo;
        $tipo->tipo_producto = $request->nombre_tipo;
        $tipo->save();
        return redirect()->route('tipos.index');
    }

    public function destroy(Tipo $tipo){
        $tipo->delete();
        return redirect()->route('tipos.index');

    }

    public function guardarmod(Tipo $tipo,Request $request){

        $request->validate([
            'nombre_tipo_mod' => 'required'
        ]);

        $tipo->tipo_producto = $request->nombre_tipo_mod;
        $tipo->save();
        return redirect()->route('tipos.index');
    }

}
