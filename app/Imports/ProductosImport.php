<?php

namespace App\Imports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductosImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $fecha = now();

        $producto = new Producto();

        //Comprobamos si la ID existe
        $producto = $producto->where('id', $row['id'])->first();

        if ($producto) {
            $producto->update([
                'modelo' => $row['modelo'],
                'color'  => $row['color'],
                'referencia_sugerida' => $row['referencia_sugerida'],
                'descripcion_corta' => $row['descripcion_corta'],
                'marca_id' => $row['marca_id'],
                'tipo_id' => $row['tipo_id'],
                'precio_coste' => $row['precio_coste'],
                'precio_vta' => $row['precio_vta'],
                'made_in' => $row['made_in'],
                'updated_at' => $fecha,

            ]);

            return $producto;
        } else {
            return new Producto([

                'modelo' => $row['modelo'],
                'color'  => $row['color'],
                'referencia_sugerida' => $row['referencia_sugerida'],
                'descripcion_corta' => $row['descripcion_corta'],
                'marca_id' => $row['marca_id'],
                'tipo_id' => $row['tipo_id'],
                'precio_coste' => $row['precio_coste'],
                'precio_vta' => $row['precio_vta'],
                'made_in' => $row['made_in'],
                'created_at' => $fecha,
                'updated_at' => $fecha,

            ]);
        }
    }
}
