<?php

namespace App\Http\Livewire;

use App\Models\CabeceraCampania;
use Livewire\Component;

class CampaniasRealizadas extends Component
{
    public $nCampanias;
    public function render()
    {
        $this->nCampanias = $this->getNCampanias();
        return view('livewire.campanias-realizadas');
    }

    protected function getNCampanias()
    {
        $campanias = CabeceraCampania::all();
        $n = count($campanias);
        return $n;
    }
}
