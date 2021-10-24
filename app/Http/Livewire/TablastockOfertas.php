<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TablastockOfertas extends Component
{
    public $ofertaId;
    public function render()
    {
        $ofertaId = $this->ofertaId;
        return view('livewire.tablastock-ofertas',compact('ofertaId'));
    }
}
