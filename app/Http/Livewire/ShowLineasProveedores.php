<?php

namespace App\Http\Livewire;

use App\Models\lineapedidos;
use App\Models\Stock;
use Livewire\Component;

class ShowLineasProveedores extends Component
{
    public $cabecera;
    public $pedido_id;
    protected $listeners = ['verAddLineaNueva' => 'verAddLineaNueva'];
    public $lineas = [];
    public function render()
    {
        $pedido = $this->cabecera;
        $this->lineas = lineapedidos::where('pedido_id',$pedido->id)->get();
   
        return view('livewire.show-lineas-proveedores');

    }

    public function verAddLineaNueva($pedido_id){
        $this->lineas = lineapedidos::where('pedido_id',$pedido_id)
                        ->get();
        $this->emit('ModActualizaSumaTotal',$pedido_id);
    }

    public function deleteLinea($linea_id){
        $pedido = $this->cabecera;
        $linea = lineapedidos::where('id',$linea_id)->first();
        $linea->delete();
        $this->actualizaStock($linea);
        $this->emit('ModActualizaSumaTotal',$pedido->id);
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
