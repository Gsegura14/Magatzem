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
    }

    public function modificarTallasProducto(Producto $producto,$tallas_select){
        $tallas = Talla::all();
        if (isset($tallas_select)){
            return view('admin.layouts.modificarTallasProducto',compact('producto','tallas_select','tallas'));
        }
        else{
            return view('admin.layouts.modificarTallasProducto',compact('producto','tallas'));
        }
        return $tallas_select;
        //

    }

    public function guardarTallas(Request $request,Producto $producto){
       if($request->get('tallas')== null){
        return redirect()->route('agregar.imagenes',compact('producto'));
       }
        $tallas = Talla::all();
        foreach($tallas as $talla){
            if(in_array($talla->id, $request->get('tallas'))){
                $producto->tallas()->attach($talla);
                return redirect()->route('agregar.imagenes',compact('producto'));
            }

        }
    }
    public function guardarTallasMod(Request $request,Producto $producto){
        if($request->get('tallas')== null){
            
            return redirect()->route('agregar.imagenes',compact('producto'));

           }
        $tallas = Talla::all();
        foreach($tallas as $talla){
            if(in_array($talla->id,$request->get('tallas'))){
              $tallas_select[] = $talla->id;  
                
            }
        }
        $producto->tallas()->sync($tallas_select);
        return redirect()->route('modificar.imagen',compact('producto')); 
    }
}

