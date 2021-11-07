<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TablastockOfertas extends Component
{
    public $ofertaId,$precio;
    //protected $listeners = ['actualizar'=>'actualizar'];
    public function render()
    {
        $ofertaId = $this->ofertaId;
        return view('livewire.tablastock-ofertas',compact('ofertaId'));
    }

    // public function actualizar(){
    //     $this->actualizar = true;
    // }
}
