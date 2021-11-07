<?php

namespace App\Imports;

use App\Models\StockOferta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RevisionOfertaImport implements ToModel, WithHeadingRow
{
    protected $ofertaId;

    function __construct($ofertaId)
    {
        $this->ofertaId = $ofertaId;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $oferta = new StockOferta();
        
         $oferta = $oferta->where('oferta_id', $this->ofertaId)
                            ->where('sku', $row['sku'])->first();

         if($oferta){
            $acp = $row['aceptar']; 
            if($acp==null){
                $acp = 0;
            }
            $oferta->update([
                'stock'             => $row['stock'],
                'precio_oferta'     => $row['precio_oferta'],
                'aceptar'           => $acp
            ]);
            return $oferta;
         }

        


        // return new StockOferta([
        //     //
        // ]);
    }
}
