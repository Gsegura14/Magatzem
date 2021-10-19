<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;


class DatatableController extends Controller
{
    public function stockOferta(){
        $stockofertas = Stock::select(
            'stocks.id',
            'stocks.sku',
            'stocks.codigo',
            'tallas.talla',
            'stocks.pedido',
            'stocks.vendido',
            'stocks.stock',
            'productos.descripcion_corta',
            'productos.color',
            'tipo.tipo_producto',
            'marcas.nombre_marca'


        )
            ->join('productos','stocks.producto_id','=','productos.id')
            ->join('tipo','productos.tipo_id','=','tipo.id')
            ->join('marcas','productos.marca_id','=','marcas.id')
            ->join('tallas','stocks.talla_id','=','tallas.id')
            ->get();
        return datatables()->of($stockofertas)->toJson();
    }
}
