<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Stock;
use App\Models\CabeceraCampaniaOferta;
use App\Models\StockOferta;
use DateTime;
use Illuminate\Support\Facades\Date;
use Livewire\Component;


class CabeceraOferta extends Component
{
    public $cliente_id, $total, $fecha, $totalmodelos, $stockId, $cantref, $cabeceraId;
    public $productos = [];
    public $stocks = [];
    public $fechaMin;
    public $diferencia;
    public $fechaOk=true;
    public function render()
    {

        $clientes = Cliente::where('id', 373)->get();
        return view('livewire.cabecera-oferta', compact('clientes'));
    }


    public function crearOferta()
    {

        $this->fechaOk = $this->evaluarFecha();

        if ($this->fechaOk == true) {
            $this->crearCabecera();
            $ofertaId = $this->getCabeceraId();
            $this->crearProductos($ofertaId);
            return redirect()->route('editar.oferta', ['ofertaId' => $ofertaId]);
        }
    }



    protected function crearCabecera()
    {

        $cabecera = new CabeceraCampaniaOferta();
        $cabecera->cliente_id = $this->cliente_id;
        $cabecera->fecha_inicio = $this->fecha;
        $cabecera->cantidad_unidades = 0;
        $cabecera->cant_modelos = 0;
        $cabecera->cant_refs = 0;
        $cabecera->save();
        $this->cabeceraId = $cabecera->id;
    }

    protected function crearProductos($id)
    {
        $stocks = Stock::all();

        foreach ($stocks as $stock) {
            $producto = new StockOferta();
            $producto->oferta_Id = $id;
            $producto->producto_id = $stock->producto_id;
            $producto->talla_id = $stock->talla_id;
            $producto->sku = $stock->sku;
            $producto->codigo = $stock->codigo;
            $producto->pedido = $stock->pedido;
            $producto->vendido = $stock->vendido;
            $producto->stock = 0;
            $producto->precio_oferta = $stock->producto->precio_vta;
            $producto->aceptar = 0;
            $producto->save();
        }
    }



    protected function getCabeceraId()
    {

        return $this->cabeceraId;
    }

    protected function evaluarFecha()
    {
        $selFecha = date_create($this->fecha);
        $hoy = date_create();
        $dias = date_diff($hoy, $selFecha)->format('%R%a');

        if (intval($dias) >= 20) {
            return true;
        } else {
            return false;
        }
    }
}
