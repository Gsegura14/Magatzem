<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class TotalFacturado extends Component
{
    public $total;
    public function render()
    {
        $this->total = $this->getTotal();
        return view('livewire.total-facturado');
    }

    protected function getTotal()
    {
        $productos = histPedidosCampania::all();
        $euros = 0;
        foreach($productos as $producto)
        {
            $u = $producto->servido;
            $e = $producto->precio_oferta;
            $euros = $euros + ($u*$e);
        }
     
        return number_format($euros,2,'.','');
    }
}
