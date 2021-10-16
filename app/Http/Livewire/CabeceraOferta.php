<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Stock;
use App\Models\CabeceraCampaniaOferta;
use App\Models\StockOferta;
use Livewire\Component;


class CabeceraOferta extends Component
{
    public $stockId,$cliente,$fecha,$cant_total,$cant_modelos,$cant_refs,$cliente_id,$prOferta,$bloquear,$descuento,$prcoste,$prventa,$ofertaId;
    public function render()
    {
        $clientes = Cliente::where('id',373)->get();
        return view('livewire.cabecera-oferta',compact('clientes'));
    }

 public function crearOferta(){

    $this->crearCabecera();
   


    return back();

 }

 protected function cantUnidades(){
     
    return 0;
 }

 protected function cantModelos(){

    return 0;
 }

 protected function cantRefs(){

    return 0;
 }

 

protected function crearCabecera(){
    $cabecera = new CabeceraCampaniaOferta();
    $cabecera->cliente_id = $this->cliente_id;
    $cabecera->fecha_inicio = $this->fecha;
    $cabecera->cantidad_unidades = $this->cantUnidades();
    $cabecera->cant_modelos = $this->cantModelos();
    $cabecera->cant_refs = $this->cantRefs();
    $cabecera->save();

    $this->ofertaId = $cabecera->id;

    


    $this->emit('guardarProductos',$this->ofertaId);


}



}
