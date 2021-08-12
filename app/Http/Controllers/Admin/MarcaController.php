<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MarcaController extends Controller
{      

    public function index(){
        $marcas = Marca::all();
        return view ('admin.productos.listaMarcas',compact('marcas'));

    }

    public function guardar(Request $request){
        
        $request->validate([
            'nombre_marca' => 'required'
        ]);
        
        $marca = new Marca;        
        $marca->nombre_marca = $request->nombre_marca;
        $marca->save();
        return redirect()->route('marcas.index');


    }

    public function destroy(Marca $marca){

        $marca->delete();
        return redirect()->route('marcas.index');
    }

    public function guardarmod(Marca $marca, Request $request){
        
        $request->validate([
            'nombre_marca_mod' => 'required'
        ]);
                
        $marca->nombre_marca = $request->nombre_marca_mod;
        $marca->save();
        return redirect()->route('marcas.index');
    }
}
