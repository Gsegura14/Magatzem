<?php

namespace App\Http\Livewire;

use App\Models\CabeceraCampania;
use Livewire\Component;

class TituloEstadisticasCampania extends Component
{
    public $campaniaId,$campania;
    public function render()
    {
        $this->campania = $this->getCampania();
        return view('livewire.titulo-estadisticas-campania');
    }

    protected function getCampania()
    {
        $c = CabeceraCampania::find($this->campaniaId);
        return $c;
    }


}
