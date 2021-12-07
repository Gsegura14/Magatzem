<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class LabelFaltas extends Component
{
    public $faltas,$porcentajefaltas,$campaniaId;

    public function render()
    {
        $this->faltas = $this->getFaltas();
        $this->porcentajefaltas = $this->getPorcentajeFaltas();
        return view('livewire.label-faltas');
    }

protected function getFaltas()
{
    $p = $this->getUnidadesPedidas();
  // $p = $pedidos->get()->sum('pedido');
    $s = $this->getUnidadesServidas();
    $faltas = $p - $s;

    return $faltas;
}

protected function getPorcentajeFaltas()
{
    return number_format((100 - ($this->getUnidadesServidas() / $this->getUnidadesPedidas() * 100)),2,'.','');
}

protected function getUnidadesPedidas()
{
    return histPedidosCampania::where('campania_id',$this->campaniaId)
            ->get()
            ->sum('pedido');
}

protected function getUnidadesServidas()
{
    return histPedidosCampania::where('campania_id',$this->campaniaId)
            ->get()
            ->sum('servido');
}

}
