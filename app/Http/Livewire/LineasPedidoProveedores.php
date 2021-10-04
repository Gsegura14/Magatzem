<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\lineapedidos;
use App\Models\Stock;

class LineasPedidoProveedores extends Component
{
    protected $listeners = ['verAddLinea'=>'verAddLinea'];
    public $pedido_id;
    
    public $lineas = [];

    public function render()
    {   
        return view('livewire.lineas-pedido-proveedores');
    }

    public function verAddLinea($pedido_id){
        $this->lineas = lineapedidos::where('pedido_id',$pedido_id)
                    ->get();
                    
        $this->emit('sumaTotalProveedores',$pedido_id);
    }

    public function deleteLinea($linea_id,$pedido_id){
        $linea = lineapedidos::find($linea_id);
        $linea->delete();
        $this->lineas = lineapedidos::where('pedido_id',$pedido_id)
                    ->get();
        $this->actualizaStock($linea);
        $this->emit('actualizaSumaProveedores',$pedido_id);
    }

    protected function actualizaStock($linea){
        $productoID = $linea->stock_id;
            $cantidad_actual = $linea->stock->stock;
            $cantidad_pedido = $linea->stock->pedido;
            $cantidadLinea = $linea->cantidad;
            $cantidad_actual = $cantidad_actual - $cantidadLinea;
            $cantidad_pedido = $cantidad_pedido - $cantidadLinea;
            Stock::where('id',$productoID)->update(['stock' => $cantidad_actual,
            'pedido' => $cantidad_pedido]);
    }
}
