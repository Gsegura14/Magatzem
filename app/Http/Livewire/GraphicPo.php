<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use App\Models\histPoOrders;
use App\Models\PedidosCampania;
use App\Models\PoOrders;
use Livewire\Component;

class GraphicPo extends Component
{
    public $campaniaId, $LabelsPo, $dataPo;
    public function render()
    {
        $this->LabelsPo = $this->getLabelsPo();
        $this->dataPo = $this->getDataPo();
        return view('livewire.graphic-po');
    }

    public function getLabelsPo()
    {
        $labels = histPoOrders::select('po_order')
            ->where('campania_id', $this->campaniaId)->get();
        return json_encode($labels,JSON_NUMERIC_CHECK);
    }

    public function getDataPo()
    {


        $dataPo = histPedidosCampania::where('campania_id', $this->campaniaId)
            ->selectRaw("sum(servido) as suma")
            ->groupBy('n_order')->get();
        return json_encode($dataPo, JSON_NUMERIC_CHECK);
    }


}
