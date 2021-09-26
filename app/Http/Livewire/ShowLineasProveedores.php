<?php

namespace App\Http\Livewire;

use App\Models\lineapedidos;

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
        $this->emit('ModActualizaSumaTotal',$pedido->id);
    }
}
