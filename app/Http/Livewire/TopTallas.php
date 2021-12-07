<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class TopTallas extends Component
{
    public $campaniaId;
    public function render()
    {
        $topTallas = $this->getTopTallas();
        return view('livewire.top-tallas',compact('topTallas'));
    }

    protected function getTopTallas()
    {

        $top = histPedidosCampania::where('campania_id',$this->campaniaId)
        ->join('tallas','hist_pedidos_campanias.talla_id','tallas.id')
        ->groupBy('tallas.talla')
        ->selectRaw("tallas.talla as talla")
        ->selectRaw("sum(hist_pedidos_campanias.servido) as suma")
        ->take(5)
        ->orderBy('suma','desc')
        ->get();

    return $top;
    }
}
