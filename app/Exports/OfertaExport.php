<?php

namespace App\Exports;

use App\Models\CabeceraCampaniaOferta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OfertaExport implements FromCollection, WithHeadings
{
    protected $ofertaId;

    function __construct($ofertaId)
    {
        $this->ofertaId = $ofertaId;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = CabeceraCampaniaOferta::select(
            'cabecera_campania_ofertas.id',
            'cabecera_campania_ofertas.fecha_inicio',
            'productos.modelo',
            'productos.color',
            'productos.descripcion_corta',
            'tallas.talla',
            'marcas.nombre_marca',
            'tipo.tipo_producto',
            'stock_ofertas.sku',
            'stock_ofertas.codigo',
            'stock_ofertas.stock',
            'productos.precio_vta',
            'stock_ofertas.precio_oferta',
            'stock_ofertas.aceptar'
        )
            ->join('stock_ofertas', 'cabecera_campania_ofertas.id', '=', 'stock_ofertas.oferta_id')
            ->join('productos', 'stock_ofertas.producto_id', '=', 'productos.id')
            ->join('tallas', 'stock_ofertas.talla_id', '=', 'tallas.id')
            ->join('tipo', 'productos.tipo_id', '=', 'tipo.id')
            ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
            ->where('stock_ofertas.oferta_id','=',$this->ofertaId)
            ->orderByDesc('stock_ofertas.sku')
            ->get();




        return $query;
    }
    public function headings(): array
    {
        return [
            'oferta_id',
            'Fecha de Inicio',
            'Modelo',
            'Color',
            'Descripción',
            'Talla',
            'Marca',
            'Tipo',
            'SKU',
            'Código',
            'Stock',
            'Precio Vta.',
            'precio_oferta',
            'aceptar'
        ];
    }
}
