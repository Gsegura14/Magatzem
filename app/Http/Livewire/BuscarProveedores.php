<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuscarProveedores extends Component
{
    public $open = false;

    public function render()
    {
        return view('livewire.buscar-proveedores');
    }
    public function activar(){
        $this->open = true;
    }
}
