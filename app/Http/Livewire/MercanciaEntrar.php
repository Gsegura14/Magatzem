<?php

namespace App\Http\Livewire;

use App\Models\lineapedidos;
use Livewire\Component;

class MercanciaEntrar extends Component
{
    public $mercancia;
    public function render()
    {
        $this->mercancia = $this->getMercancia();
        return view('livewire.mercancia-entrar');
    }

    protected function getMercancia()
    {
        $mercancias = lineapedidos::all();
        $pendiente = 0;

        foreach($mercancias as $mercancia)
        {
            $cant = $mercancia->cantidad;
            $rec  = $mercancia->recibido;
            $pendiente = $pendiente + ($cant - $rec);
        }

        return $pendiente;
    }
}
