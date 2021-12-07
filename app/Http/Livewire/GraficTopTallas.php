<?php

namespace App\Http\Livewire;
use App\Models\histPedidosCampania;
use Livewire\Component;

class GraficTopTallas extends Component
{
    public $campaniaId,$dataTallas;
    public function render()
    {
        $this->dataTallas = $this->getTallas();
        return view('livewire.grafic-top-tallas');
    }

    protected function getTallas()
    {
        $tallas = histPedidosCampania::where('campania_id',$this->campaniaId)
        ->join('tallas','hist_pedidos_campanias.talla_id','tallas.id')
        ->groupBy('tallas.talla')
        ->selectRaw("tallas.talla as talla")
        ->selectRaw("sum(hist_pedidos_campanias.servido) as suma")
        ->orderBy('talla','asc')
        ->get();

        return json_encode($tallas,JSON_NUMERIC_CHECK);
    }


}
