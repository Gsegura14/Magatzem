<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Talla;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TallasController extends Controller
{      

    public function index(){
        $tallas = Talla::all();
        return view ('admin.productos.listaTallas',compact('tallas'));

    }

    public function guardar(Request $request){
        
        $request->validate([
            'talla' => 'required'
        ]);
        
        $talla = new Talla();        
        $talla->talla = $request->talla;
        $talla->save();
        return redirect()->route('tallas.index');


    }

    public function destroy(Talla $talla){

        $talla->delete();
        return redirect()->route('tallas.index');
    }

    public function guardarmod(Talla $talla, Request $request){
        
        $request->validate([
            'talla_mod' => 'required'
        ]);
                
        $talla->talla = $request->talla;
        $talla->save();
        return redirect()->route('tallas.index');
    }

    public function mostrarTallas(Producto $producto){
        $tallas = Talla::all();
        return view('admin.layouts.agregarTallas',compact('producto','tallas'));
        //return $producto."<br> Listado de tallas<br>".$tallas;
    }

    public function guardarTallas(Request $request,Producto $producto){
        $tallas = Talla::all();
        foreach($tallas as $talla){
        if(in_array($talla->id, $request->get('tallas'))){
                
           $producto->tallas()->attach($talla);
           return view('admin.layouts.agregarFotoProducto',compact('producto'));      
        }
    }
       

    }
}

