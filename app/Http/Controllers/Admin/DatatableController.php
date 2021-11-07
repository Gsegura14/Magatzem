<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockOferta;

class DatatableController extends Controller
{

    public function stockOferta($ofertaId)
    {
        $stockofertas = StockOferta::select(
            'stock_ofertas.id',
            'stock_ofertas.oferta_id',
            'stock_ofertas.sku',
            'stock_ofertas.codigo',
            'tallas.talla',
            'stock_ofertas.pedido',
            'stock_ofertas.vendido',
            'stock_ofertas.stock',
            'productos.descripcion_corta',
            'productos.color',
            'tipo.tipo_producto',
            'marcas.nombre_marca',
            'productos.precio_vta',
            'stock_ofertas.precio_oferta',
            'stock_ofertas.aceptar'


        )
            ->join('productos', 'stock_ofertas.producto_id', '=', 'productos.id')
            ->join('tipo', 'productos.tipo_id', '=', 'tipo.id')
            ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
            ->join('tallas', 'stock_ofertas.talla_id', '=', 'tallas.id')
            ->where('stock_ofertas.oferta_id', '=', $ofertaId)
            ->get();


        return datatables()->of($stockofertas)
            ->toJson();
    }
}
