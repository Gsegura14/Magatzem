<?php

namespace App\Http\Livewire;
use App\Models\Cliente;
use App\Models\CabeceraCliente;


use Livewire\Component;

class BuscadorClientes extends Component
{
    public $search;
    public $cliente_id;

   
    public function render()
    {
        //$clientes = Cliente::where('nombre','like','%'.$this->search.'%')->get();
        $clientes = Cliente::all();
        return view('livewire.buscador-clientes',compact('clientes'));
    }

    public function crearPedido(){

       $this->emit('completarCabecera',$this->cliente_id);
    }


    public function salir(){
        return redirect()->route('pedidosclientes.index');
    }

  

    

}
