<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\lineaspedidocliente;

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

        $this->emit('actualizaSuma',$pedido_id);
    }
}
