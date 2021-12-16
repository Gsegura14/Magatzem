<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class MarcasTop extends Component
{
    public $marcasTop;   
    public function render()
    {
        $this->marcasTop = $this->getTopFiveMarcas();
        return view('livewire.marcas-top');
    }

    protected function getTopFiveMarcas()
    {
        $top = histPedidosCampania::join('productos','hist_pedidos_campanias.producto_id','productos.id')
                ->join('marcas','productos.marca_id','marcas.id')
                ->selectRaw("marcas.nombre_marca as marca")
                ->selectRaw("sum(hist_pedidos_campanias.servido) as suma" )
                ->groupBy('marcas.nombre_marca')
                ->get();

                return json_encode($top,JSON_NUMERIC_CHECK);
    }
}
