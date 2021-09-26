<?php

namespace App\Http\Livewire;

use App\Models\lineaspedidocliente;

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
        $this->emit('actualizaSumaTotal',$pedido->id);
    }
}
