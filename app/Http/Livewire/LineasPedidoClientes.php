<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\lineaspedidocliente;
use App\Models\Stock;

class LineasPedidoClientes extends Component
{
    protected $listeners = ['verAddLinea'=>'verAddLinea'];
    public $pedido_id;
    
    public $lineas = [];
    

    public function render()
    {   
        return view('livewire.lineas-pedido-clientes');
    }

    public function verAddLinea($pedido_id){
        $this->lineas = lineaspedidocliente::where('pedido_id',$pedido_id)
                    ->get();
        $this->emit('sumaTotal',$pedido_id);
    }

    public function deleteLinea($linea_id,$pedido_id){
        $linea = lineaspedidocliente::find($linea_id);
        $linea->delete();
        $this->lineas = lineaspedidocliente::where('pedido_id',$pedido_id)
                    ->get();
        $this->actualizaStock($linea);
        $this->emit('actualizaSuma',$pedido_id);
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
