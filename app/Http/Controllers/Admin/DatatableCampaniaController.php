<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockCampania;

class DatatableCampaniaController extends Controller
{
    public function stockCampania($campaniaId)
    {
        $stockCampanias = StockCampania::select(

            'stock_campanias.id',
            'stock_campanias.campania_id',
            'cabecera_campanias.nombre_campania',
            'stock_campanias.sku',
            'stock_campanias.codigo',
            'tallas.talla',
            'stock_campanias.stock',
            'productos.descripcion_corta',
            'productos.color',
            'tipo.tipo_producto',
            'marcas.nombre_marca',
            'productos.precio_vta',
            'stock_campanias.precio_oferta',
            'stock_campanias.pedido',
            'stock_campanias.servido'


        )
        ->join('cabecera_campanias','stock_campanias.campania_id','=','cabecera_campanias.id')
        ->join('productos','stock_campanias.producto_id','=','productos.id')
        ->join('tipo','productos.tipo_id','=','tipo.id')
        ->join('marcas','productos.marca_id','=','marcas.id')
        ->join('tallas','stock_campanias.talla_id','=','tallas.id')
        ->where('stock_campanias.campania_id','=',$campaniaId)
        
        ->get();

        return datatables()->of($stockCampanias)
        ->toJson();
    }
}
