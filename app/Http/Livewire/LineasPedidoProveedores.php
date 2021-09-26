<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\lineapedidos;

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

        $this->emit('actualizaSumaProveedores',$pedido_id);
    }
}
