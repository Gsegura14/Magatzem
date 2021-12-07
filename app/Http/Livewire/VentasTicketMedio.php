<?php

namespace App\Http\Livewire;

use App\Models\histPedidosCampania;
use Livewire\Component;

class VentasTicketMedio extends Component
{
    public $campaniaId,$ticketMedio,$ventasTotales;
    public function render()
    {
      
        $this->ventasTotales = $this->getVentasTotales();
        $this->ticketMedio = $this->getTicketMedio($this->ventasTotales);
        return view('livewire.ventas-ticket-medio');
    }
    
    protected function getVentasTotales()
    {
        $ventas = 0;

        $productos = histPedidosCampania::where('campania_id',$this->campaniaId)->get();

        foreach($productos as $producto){
            $ventas = $ventas + ($producto->servido*$producto->precio_oferta);
        }

        return $ventas;
    }   

    protected function getTicketMedio($ventas)
    {
        $unidades = histPedidosCampania::where('campania_id',$this->campaniaId)
                    ->get()
                    ->sum('servido');
        $ticket = $ventas / $unidades;
        return number_format($ticket,2,',','');
        
    }

}
