<?php

namespace App\Imports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class StockImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $fecha = now();

        $producto = new Stock();

        // Comprobamos si la ID existe
        $producto = $producto->where('id', $row['id'])->first();

        if ($producto) {
            $producto->update([
                'sku'         => $row['sku'],
                'codigo'      => $row['codigo'],
                'pedido'      => $row['pedido'],
                'vendido'     => $row['vendido'],
                'stock'       => $row['stock'],
                'updated_at'  => $fecha,
            ]);

            return $producto;
        } elseif(!$producto) {
            return new Stock([
                'id'          => $row['id'],
                'producto_id' => $row['producto_id'],
                'talla_id'    => $row['talla_id'],
                'sku'         => $row['sku'],
                'codigo'      => $row['codigo'],
                'pedido'      => $row['pedido'],
                'vendido'     => $row['vendido'],
                'stock'       => $row['stock'],
                'created_at'  => $fecha,
                'updated_at'  => $fecha,
            ]);
        }
    }
}
