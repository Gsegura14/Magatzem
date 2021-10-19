<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Stock;
use App\Models\CabeceraCampaniaOferta;
use App\Models\StockOferta;
use Livewire\Component;
use App\Models\Producto;

class CabeceraOferta extends Component
{
    //public $stockId,$cliente,$fecha,$cant_total,$cant_modelos,$cant_refs,$cliente_id,$proferta,$bloquear,$descuento,$prcoste,$prventa,$ofertaId;
    public $cliente_id,$total,$fecha,$totalmodelos,$stockId,$cantref;
    public $productos = [];
    public $stocks = [];
    public $control = false;


    
    public function render()
    {
    
        $cabecera = new CabeceraCampaniaOferta();
       
        $cabecera->save();
        $id = $cabecera->id;
        //$productos = $this->crearProductos($id);
        $this->total = $this->cantUnidades();
        $this->cantref = $this->cantRefs();
        $this->totalmodelos = $this->cantModelos();
        $clientes = Cliente::where('id',373)->get();
        return view('livewire.cabecera-oferta',compact('clientes','cabecera'));
    }

 public function crearOferta(){

    //$this->crearCabecera();
   


    

 }

 protected function cantUnidades(){
    $unidades = Stock::all()->sum('stock');
    return $unidades;
 }

 protected function cantModelos(){

    $modelos = Producto::all()->groupBy('modelo')->count();
        
    return $modelos;
 }

 protected function cantRefs(){

    $referencias = Stock::where('stock','!=',0)->count();
    return $referencias;
 }

 

protected function crearCabecera(){

    
    $cabecera = new CabeceraCampaniaOferta();
    $cabecera->cliente_id = $this->cliente_id;
    $cabecera->fecha_inicio = $this->fecha;
    $cabecera->cantidad_unidades = $this->cantUnidades();
    $cabecera->cant_modelos = $this->cantModelos();
    $cabecera->cant_refs = $this->cantRefs();
    $cabecera->save();


    




}

protected function crearProductos($id){
   $stocks = Stock::all();

        foreach($stocks as $stock){
            $producto = new StockOferta();
            $producto->oferta_Id = $id;
            $producto->producto_id = $stock->producto_id;
            $producto->talla_id = $stock->talla_id;
            $producto->sku = $stock->sku;
            $producto->codigo = $stock->codigo;
            $producto->pedido = $stock->pedido;
            $producto->vendido = $stock->vendido;
            $producto->stock = $stock->stock;
            $producto->save();

            

        }
        
        $this->verProductos($id);
    }

    protected function verProductos($ofertaId){
        $this->productos = StockOferta::where('oferta_id',$ofertaId)->get();
        $this->control = true;
    }

}
