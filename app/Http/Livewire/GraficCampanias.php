<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class GraficCampanias extends Component
{
    public $campaniasVentas;
    public function render()
    {
        $this->campaniasVentas = $this->getCampaniasVentas();
        return view('livewire.grafic-campanias');
    }

    protected function getCampaniasVentas()
    {
        $campanias = histPedidosCampania::join('cabecera_campanias','hist_pedidos_campanias.campania_id','cabecera_campanias.id')
                    ->selectRaw('cabecera_campanias.nombre_campania as campania')
                    ->selectRaw( "sum(hist_pedidos_campanias.servido) as suma" )
                    ->groupBy('cabecera_campanias.nombre_campania')
                    ->get();

                    return json_encode($campanias,JSON_NUMERIC_CHECK);
    }
}
