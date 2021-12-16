<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class UnidadesVendidasAnyo extends Component
{
    public $unidades;
    public function render()
    {
        $this->unidades = $this->getUnidades();
        return view('livewire.unidades-vendidas-anyo');
    }

    protected function getUnidades()
    {
        $productos = histPedidosCampania::all();
        $unidades=$productos->sum('servido');
        
        return $unidades;
    }
}
