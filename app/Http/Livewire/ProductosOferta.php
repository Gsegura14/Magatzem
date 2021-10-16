<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Stock;
use App\Models\StockOferta;

class ProductosOferta extends Component
{
    public $productos = [];

    protected $listeners = [
        'guardarProductos' => 'guardarProductos'
    ];

    public function render()
    {
        return view('livewire.productos-oferta');
    }

    public function guardarProductos($ofertaId){

        $stocks = Stock::all();
        foreach($stocks as $stock){
            $producto = new StockOferta();
            $producto->oferta_Id = $ofertaId;
            $producto->producto_id = $stock->producto_id;
            $producto->talla_id = $stock->talla_id;
            $producto->sku = $stock->sku;
            $producto->codigo = $stock->codigo;
            $producto->pedido = $stock->pedido;
            $producto->vendido = $stock->vendido;
            $producto->stock = $stock->stock;
            $producto->save();

            

        }
        
        $this->verProductos($ofertaId);
    }

    protected function verProductos($ofertaId){
        $this->productos = StockOferta::where('oferta_id',$ofertaId)->get();
    }

}
