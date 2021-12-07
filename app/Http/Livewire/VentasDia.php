<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use App\Models\histPoOrders;
use Livewire\Component;
use PhpParser\Node\Expr\AssignOp\Concat;

class VentasDia extends Component
{
    public $campaniaId;
    public function render()
    {
        $ventasDia = $this->getVentas();
        $pos = $this->getPos();
      
        return view('livewire.ventas-dia',compact('ventasDia','pos'));
    }


    protected function getVentas()

    {
        $v = histPedidosCampania::where('campania_id',$this->campaniaId)
        ->selectRaw("sum(servido) as suma")
        ->groupBy('n_order')
        ->get();

        return $v;
    }

    protected function getPos()
    {
        $ps = histPoOrders::where('campania_id',$this->campaniaId)
            ->select('po_order')
            ->get();

        return $ps;
    }


}
