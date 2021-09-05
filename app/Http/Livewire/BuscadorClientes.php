<?php

namespace App\Http\Livewire;
use App\Models\Cliente;
use App\Models\CabeceraCliente;


use Livewire\Component;

class BuscadorClientes extends Component
{
    public $search;
    

    public function render()
    {
        $clientes = Cliente::where('nombre','like','%'.$this->search.'%')->get();
        return view('livewire.buscador-clientes',compact('clientes'));
    }

    public function crearPedido($cliente_id){

        $this->emit('completarCabecera',$cliente_id);

    }

}
