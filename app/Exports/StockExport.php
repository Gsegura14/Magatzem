<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class StockExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Stock::select('id','sku','codigo','pedido','vendido','stock')->get();
    }

    public function headings(): array
    {
        return ['ID','SKU','CODIGO','PEDIDO','VENDIDO','STOCK'];
    }
}
