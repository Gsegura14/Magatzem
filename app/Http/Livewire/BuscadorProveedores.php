<?php

namespace App\Http\Livewire;
use App\Models\Proveedor;
use Livewire\Component;

class BuscadorProveedores extends Component
{
    public $proveedor_id;

   
    public function render()
    {
        $proveedores = Proveedor::all();
        return view('livewire.buscador-proveedores',compact('proveedores'));
    }

    public function crearPedido(){

       $this->emit('completarCabecera',$this->proveedor_id);
    }


    public function salir(){
        return redirect()->route('pedidoProveedor.index');
    }

  

    

}
