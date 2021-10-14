<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Tipo;
use App\Models\Marca;
use App\Models\Imagen;
use App\Models\Talla;
use App\Models\Stock;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductosImport;
use App\Exports\ProductoExport;




class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $tipos = Tipo::all();
        $marcas = Marca::all();


        return view('admin.productos.index', compact('productos', 'tipos', 'marcas'));
    }

    public function verProducto(Producto $producto)
    {
        $tipos = Tipo::all();
        $marcas = Marca::all();
        $tallas = Talla::all();
        $imagenes = Imagen::all();
        $stockProducto = Stock::select('talla_id')->where('producto_id', $producto->id)->get();


        // $array = json_decode( json_encode( $object ), true );

        //echo($stockProducto);

        // $todastallas = Talla::all()->value('id')->get();



        return view('admin.productos.verProducto', compact('producto', 'tipos', 'marcas', 'imagenes', 'tallas', 'stockProducto'));
    }


    public function nuevo()
    {
        $tipos = Tipo::all();
        $marcas = Marca::all();
        $tallas = Talla::all();
        $imagenes = Imagen::all();

        return view('admin.productos.nuevo', compact('tipos', 'marcas', 'tallas', 'imagenes'));
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function guardar(Request $request)
    {

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
        $refSug = $request->modelo . "-" . $request->color;
        $imagenId = $request->radioImagen;
        $stock = $request->stock;

        $producto = new Producto();
        $producto->modelo               = $request->modelo;
        $producto->color                = $request->color;
        $producto->referencia_sugerida  = $refSug;
        $producto->descripcion_corta    = $request->descripcion_corta;
        $producto->marca_id             = $marcaId;
        $producto->tipo_id              = $tipoId;
        $producto->precio_coste         = $request->precio_coste;
        $producto->precio_vta           = $request->precio_venta;
        $producto->made_in              = $madeIn;
        $producto->imagen_id            = $imagenId;
        $producto->save();



        if ($request->input('selectTallas') != null) {
            $tallasID = implode(',', $request->input('selectTallas'));
        }
        // foreach($tallasID as $tallaID){



        // $producto->talla_id             = $tallaID;



        // }


        return redirect()->route('stock.create', compact('producto', 'tallasID', 'stock'));
    }

    public function guardarMod(Request $request, Producto $producto)
    {

        $request->validate([
            'modelo' => 'required',
            'color' => 'required',
            'descripcion_corta' => 'required',
            'precio_coste' => 'required',
            'precio_venta' => 'required',
            'selectTallas' => 'required'
        ]);

        $tipoId = $request->get('selTipo');
        $marcaId = $request->get('selMarca');
        $madeIn = $request->get('selPais');
        $refSug = $request->modelo . "-" . $request->color;
             // Guarda modificación del registro padre
        $producto->modelo = $request->modelo;
        $producto->color = $request->color;
        $producto->referencia_sugerida = $refSug;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->marca_id = $marcaId;
        $producto->tipo_id = $tipoId;
        $producto->precio_coste = $request->precio_coste;
        $producto->precio_vta = $request->precio_venta;
        $producto->made_in = $madeIn;
        $producto->imagen_id = $request->imagenId;
        $producto->save();

        if (empty($request->input('selectTallas'))) {
            $lineas = stock::where('producto_id', $producto->id)->get();
            if (!$lineas == null) {
                foreach ($lineas as $linea) {
                    $linea->delete();
                }
                return redirect()->route('productos.index');
            }
        } else
            $request->input('selectedTallas');
            $tallasID = implode(',', $request->input('selectTallas'));
            return redirect()->route('stock.update', compact('producto', 'tallasID'));
    }



public function exportExcel(){
    
    $hora = now();
    $archivo = 'productos_'.$hora.'.xlsx';
    return Excel::download(new ProductoExport,$archivo);

}


public function frmImportar(){
    return view('admin.productos.importProductos');
}

public function importar(Request $request){

        $archivo = $request->file('productosImport');
        Excel::import(new ProductosImport,$archivo);

        return redirect()->route('productos.index');;
}

}
