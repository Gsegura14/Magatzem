<?php

namespace App\Exports;

use App\Models\PedidosCampania;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class POExport implements FromCollection, WithHeadings
{
    protected $po_id;

    function __construct($po_id)
    {
        $this->po_id = $po_id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = PedidosCampania::select(
            'po_orders.po_order',
            'pedidos_campanias.sku',
            'pedidos_campanias.codigo',
            'pedidos_campanias.pedido',
            'pedidos_campanias.servido'
        )
            ->join('po_orders', 'pedidos_campanias.po_number_id', 'po_orders.id')
            ->where('po_orders.id', $this->po_id)
            ->where('pedidos_campanias.enviado', 0)
            ->get();
            
            return $query;
    }

    public function headings(): array
    {
        return [
            'PO Order',
            'SKU',
            'EAN',
            'Pedido',
            'servido'
        ];
    }

   
}
