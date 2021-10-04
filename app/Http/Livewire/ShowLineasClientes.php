<?php

namespace App\Http\Livewire;

use App\Models\lineaspedidocliente;
use App\Models\Stock;
use Livewire\Component;

class ShowLineasClientes extends Component
{
    public $pedido;
    public $pedido_id;
    protected $listeners = ['verAddLineaNueva' => 'verAddLineaNueva'];
    public $lineas = [];
    public function render()
    {
        $pedido = $this->pedido;
        $this->lineas = lineaspedidocliente::where('pedido_id',$pedido->id)->get();
   
        return view('livewire.show-lineas-clientes');

    }

    public function verAddLineaNueva($pedido_id){
        $this->lineas = lineaspedidocliente::where('pedido_id',$pedido_id)
                        ->get();
        $this->emit('actualizaSumaTotal',$pedido_id);
    }

    public function deleteLinea($linea_id){
        $pedido = $this->pedido;
        $linea = lineaspedidocliente::where('id',$linea_id)->first();
        $linea->delete();
        $this->actualizaStock($linea);
        $this->emit('actualizaSumaTotal',$pedido->id);
    }

    protected function actualizaStock($linea){
        $productoID = $linea->stock_id;
        $cantidad_actual = $linea->stock->stock;
        $cantidad_vendido = $linea->stock->vendido;
        $cantidadLinea = $linea->cantidad;
        $cantidad_actual = $cantidad_actual + $cantidadLinea;
        $cantidad_vendido = $cantidad_vendido - $cantidadLinea;
        Stock::where('id',$productoID)->update(['stock' => $cantidad_actual,
        'vendido' => $cantidad_vendido]);
}
}
