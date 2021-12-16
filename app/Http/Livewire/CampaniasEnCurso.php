<?php

namespace App\Http\Livewire;

use App\Models\CabeceraCampania;
use Livewire\Component;

class CampaniasEnCurso extends Component
{
    public $campanias;
    public function render()
    {
        $this->campanias = $this->getCampaniasEnCurso();
        return view('livewire.campanias-en-curso');
    }

    protected function getCampaniasEnCurso()
    {
        $c = CabeceraCampania::where('estado_id',2)->count();
        return $c;
    }
}
