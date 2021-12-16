<?php

namespace App\Http\Livewire;

use App\Models\CabeceraCliente;
use Livewire\Component;

class PedidosClientes extends Component
{
    public $nPedidosClientes;
    public function render()
    {
        $this->nPedidosClientes = $this->getnPedidosClientes();
        return view('livewire.pedidos-clientes');
    }

    protected function getnPedidosClientes()
    {

        $pedidos = CabeceraCliente::all();
        $n = $pedidos->count();
        return $n;
    }
}

