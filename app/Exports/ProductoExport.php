<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductoExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Producto::select('id','modelo','color',
                        'referencia_sugerida','descripcion_corta',
                        'marca_id','tipo_id','precio_coste','precio_vta',
                        'made_in','imagen_id')->get();
    }
    public function headings(): array
    {
        return ['ID','MODELO','COLOR','REFERENCIA','DESCRIPCION','MARCA ID','TIPO ID',
                    'PRECIO COSTE','PRECIO VENTA','MADE IN','IMAGEN ID'];

    }
}
