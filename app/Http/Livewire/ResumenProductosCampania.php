<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class ResumenProductosCampania extends Component
{
    public $campaniaId;

    public function render()
    {
        $pedidos = $this->getResumenPedidos();
        return view('livewire.resumen-productos-campania',compact('pedidos'));
    }

    protected function getResumenPedidos()
    {
        $pedidos = histPedidosCampania::where('campania_id',$this->campaniaId)
                ->join('productos','hist_pedidos_campanias.producto_id','productos.id')
                ->selectRaw('productos.modelo as modelo')
                ->selectRaw('productos.color as color')
                ->selectRaw('sum(hist_pedidos_campanias.servido) as cantidad')
                ->selectRaw('productos.descripcion_corta as descripcion')
                ->selectRaw('hist_pedidos_campanias.precio_oferta as precio')
                ->selectRaw('(sum(hist_pedidos_campanias.servido) * hist_pedidos_campanias.precio_oferta) as total')
                ->groupBy('modelo','color','descripcion','precio')
                ->get();

        return $pedidos;
    }
}
