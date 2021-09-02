<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class BuscarClientes extends Component
{
    public $cliente;
    public $search;

    public function render()
    {
        $clientes = Cliente::where('nombre','like','%' . $this->search . '%')->get();
        return view('livewire.buscar-clientes',compact('clientes'));
    }
}
