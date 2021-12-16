<?php

namespace App\Http\Livewire;

use App\Models\Cabeceraproveedores;
use Livewire\Component;

class PedidosProveedores extends Component
{
    public $pedidosProveedores;
    public function render()
    {
        $this->pedidosProveedores = $this->getPedidosProveedores();
        return view('livewire.pedidos-proveedores');
    }

    protected function getPedidosProveedores()
    {
        $pedidosP = Cabeceraproveedores::all();
        $n = $pedidosP->count();
        return $n;
    }


}
