<?php

namespace App\Http\Livewire;
use App\Models\StockOferta;
use App\Models\Producto;
use App\Models\CabeceraCampaniaOferta;

use Livewire\Component;

class CabeceraOfertas extends Component
{
    // Propiedades de la cabecera
    public $unidades,$modelos,$referencias,$ofertaId,$fecha,$cliente;
  
    
    public function render()
    {
        $this->completarCabecera($this->ofertaId);
        return view('livewire.cabecera-ofertas');
    }


protected function completarCabecera($id){

    CabeceraCampaniaOferta::where('id',$id)
        ->update(
            [
               'cantidad_unidades' => $this->cantUnidades(),
               'cant_modelos'      => $this->cantModelos(),
               'cant_refs'         => $this->cantRefs()  
            ]
            );

   
   
    $this->CargarCabecera($id);

}


protected function CargarCabecera($id){
    $oferta = CabeceraCampaniaOferta::where('id',$id)->first();
    $this->unidades = $oferta->cantidad_unidades;
    $this->modelos = $oferta->cant_modelos;
    $this->referencias = $oferta->cant_refs;
    $this->fecha = $oferta->fecha_inicio;
    $this->cliente = $oferta->cliente->nombre;

}




    protected function cantUnidades(){
        $unidades = StockOferta::where('oferta_id',$this->ofertaId)
        ->sum('stock');
        return $unidades;
     }
    
     protected function cantModelos(){
    
        $modelos = Producto::all()->groupBy('modelo')->count();
            
        return $modelos;
     }
    
     protected function cantRefs(){
    
        $referencias = Stockoferta::where('oferta_id',$this->ofertaId)
                ->where('stock','>',0)        
                ->count();
        return $referencias;
     }
}
