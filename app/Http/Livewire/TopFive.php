<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class TopFive extends Component
{
    public $campaniaId;
    public function render()
    {
        $ventasTop = $this->getTopFive();
        return view('livewire.top-five',compact('ventasTop'));
    }


public function getTopFive()
{
    $top = histPedidosCampania::where('campania_id',$this->campaniaId)
            ->join('productos','hist_pedidos_campanias.producto_id','productos.id')
            ->groupBy('productos.modelo')
            ->selectRaw("productos.modelo as modelo")
            ->selectRaw("sum(hist_pedidos_campanias.servido) as suma")
            ->take(5)
            ->get();
    return $top;
}
}
