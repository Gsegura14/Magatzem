<?php

namespace App\Http\Livewire;

use App\Models\lineaspedidocliente;
use Livewire\Component;

class MercanciaServir extends Component
{
    public $pendiente;
    public function render()
    {
        $this->pendiente = $this->getPendiente();
        return view('livewire.mercancia-servir');
    }

    protected function getPendiente()
    {
        $pedidos = lineaspedidocliente::all();
        $p = $pedidos->sum('cantidad');
        return $p;
    }
}
