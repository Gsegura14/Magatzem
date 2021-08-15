<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Tipo;
use App\Models\Marca;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::all();
        $tipos = Tipo::all();
        $marcas = Marca::all();
        return view('admin.productos.index',compact('productos','tipos','marcas'));
    }

    public function verProducto(Producto $producto){
       
        $tipos = Tipo::all();
        $marcas = Marca::all();
        return view('admin.productos.verProducto',compact('producto','tipos','marcas'));
    }

    
    public function nuevo(){
        $tipos = Tipo::all();
        $marcas = Marca::all();
        return view('admin.productos.nuevo',compact('tipos','marcas'));
    }

    public function destroy(Producto $producto){        
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function guardar(Request $request){

        $request->validate([
            'modelo' => 'required',
            'color' => 'required',
            'descripcion_corta' => 'required',
            'precio_coste' => 'required',
            'precio_venta' => 'required'
        ]);

        $tipoId = $request->get('selTipo');
        $marcaId = $request->get('selMarca');
        $madeIn = $request->get('selPais');
        $refSug = $request->modelo."-".$request->color;

        $producto = new Producto();

        $producto->modelo = $request->modelo;
        $producto->color = $request->color;
        $producto->referencia_sugerida = $refSug;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->marca_id = $marcaId;
        $producto->tipo_id = $tipoId;
        $producto->precio_coste = $request->precio_coste;
        $producto->precio_vta = $request->precio_venta;
        $producto->made_in = $madeIn;

        $producto->save();

        return redirect()->route('tallas.select',compact('producto'));
      

    }

    public function guardarMod(Request $request, Producto $producto){

        $request->validate([
            'modelo' => 'required',
            'color' => 'required',
            'descripcion_corta' => 'required',
            'precio_coste' => 'required',
            'precio_venta' => 'required'
        ]);

        $tipoId = $request->get('selTipo');
        $marcaId = $request->get('selMarca');
        $madeIn = $request->get('selPais');
        $refSug = $request->modelo."-".$request->color;

        $producto->modelo = $request->modelo;
        $producto->color = $request->color;
        $producto->referencia_sugerida = $refSug;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->marca_id = $marcaId;
        $producto->tipo_id = $tipoId;
        $producto->precio_coste = $request->precio_coste;
        $producto->precio_vta = $request->precio_venta;
        $producto->made_in = $madeIn;

        $producto->save();
        return redirect()->route('productos.index');
    }
}
