<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class TopFiveGeneral extends Component
{

    public function render()
    {
        $topFive = $this->getTopFive();
        return view('livewire.top-five-general',compact('topFive'));
    }

    protected function getTopFive()
    {
        $top = histPedidosCampania::join('productos','hist_pedidos_campanias.producto_id','productos.id')
            ->groupBy('productos.modelo')
            ->selectRaw("productos.modelo as modelo")
            ->selectRaw("sum(hist_pedidos_campanias.servido) as suma")
            ->orderBy('suma','desc')
            ->take(5)
            ->get();
    return $top;
    }

}
