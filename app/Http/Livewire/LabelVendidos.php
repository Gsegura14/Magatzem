<?php

namespace App\Http\Livewire;

use App\Models\CabeceraCampania;
use App\Models\histPedidosCampania;
use App\Models\PedidosCampania;
use Livewire\Component;

class LabelVendidos extends Component
{
    public $vendidos,$campaniaId,$stock;
    public function render()
    {
        $this->stock = $this->getStock();
        $this->vendidos = $this->getVendidos();
        return view('livewire.label-vendidos');
    }

    protected function getStock()
    {
        $campania =  CabeceraCampania::find($this->campaniaId);

        return $campania->cantidad_unidades;
    }

    protected function getVendidos()
    {
        $ven = histPedidosCampania::where('campania_id',$this->campaniaId)->get()->sum('servido');
        return $ven;
    }


}
