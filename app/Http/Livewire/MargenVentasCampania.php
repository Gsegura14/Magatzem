<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use App\Models\histStocksCampania;
use Livewire\Component;

class MargenVentasCampania extends Component
{
    public $campaniaId,$margen,$coste,$percentMargen;
    public function render()
    {
    $this->coste=$this->getCosteCampania();
    $this->margen = $this->getMargenVentasCampania(); 
    $this->percentMargen = $this->GetPercentMargen();
       return view('livewire.margen-ventas-campania');
    }

    protected function getMargenVentasCampania()

    {
        $pcoste = $this->getCosteCampania();
        $venta = $this->getVentaCampania();
        $mar = $venta-$pcoste;
        return $mar;
    }

    protected function getCosteCampania()
    {   
        $cs = histStocksCampania::where('campania_id',$this->campaniaId)
                ->get();
        $costes = 0;
        foreach($cs as $c)
        {
            $eur = $c->servido * $c->precio_oferta;
            $costes = $costes + $eur;
        }     
        return $costes;
    }

    protected function getVentaCampania()
    {
        $cs = histpedidosCampania::where('campania_id',$this->campaniaId)
            ->get();
        $ventas = 0;
        foreach($cs as $c)
            {
                $eur = $c->servido * $c->precio_oferta;
                $ventas = $ventas + $eur;
            }
            return $ventas;
    }
    protected function GetPercentMargen()
    {
        return number_format(((($this->getVentaCampania()) - ($this->getCosteCampania())) / 100),2,'.','');
    }
}
