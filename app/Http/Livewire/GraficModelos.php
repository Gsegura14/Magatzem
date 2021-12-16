<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class GraficModelos extends Component
{
    public $modelosTop;
    public function render()
    {
        $this->modelosTop = $this->getModelosTop();
        return view('livewire.grafic-modelos');
    }

    protected function getModelosTop()
    {
        $top = histPedidosCampania::join('productos', 'hist_pedidos_campanias.producto_id', 'productos.id')
            ->groupBy('productos.modelo')
            ->selectRaw("productos.modelo as modelo")
            ->selectRaw("sum(hist_pedidos_campanias.servido) as suma")
            ->orderBy('suma', 'desc')
            ->take(10)
            ->get();
        return json_encode($top, JSON_NUMERIC_CHECK);
    }
}
