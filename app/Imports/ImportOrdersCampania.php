<?php

namespace App\Imports;

use App\Models\CabeceraCampania;
use App\Models\PedidosCampania;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Stock;

class ImportOrdersCampania implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    private $campania_id;
    private $PO_order_id;
    private $n_orden;

    public function __construct($campania_id, $PO_order_id, $n_orden)
    {
        $this->campania_id    = $campania_id;
        $this->PO_order_id    = $PO_order_id;
        $this->n_orden        = $n_orden;
    }


    public function model(array $row)
    {
        $producto = $this->getProducto($row['ean']);
        $talla_id = $producto['talla_id'];
        $producto_id = $producto['producto_id'];
        $precio = $this->getPrecio($row['unitary_cost_without_vat']);
        $this->updateEstadoCampania();

        return new PedidosCampania([

            'campania_id' => $this->campania_id,
            'po_number_id'   => $this->PO_order_id,
            'producto_id' => $producto_id,
            'talla_id'    => $talla_id,
            'sku'         => $row['sku'],
            'codigo'      => $row['ean'],
            'pedido'      => $row['total_unit_to_send'],
            'servido'     => 0,
            'precio_oferta' => $precio,
            'n_order'     => $this->n_orden
        ]);
    }

    protected function updateEstadoCampania()
    {
        $campania = $this->getCampania($this->campania_id);
        $campania->update([
         'estado_id' => 2
        ]);
    }

    protected function getCampania($id)
    {
        $campania = CabeceraCampania::find($id);
        return $campania;
    }



    protected function getProducto($ean)
    {
        $linea = Stock::select('id', 'producto_id', 'talla_id')
            ->where('codigo', $ean)

            ->first();

        return $linea;
    }

    protected function getPrecio($precio)
    {
        $pr = rtrim($precio, '€');
        $pr = str_replace(',', '.', $pr);
        return floatval($pr);
    }
}
