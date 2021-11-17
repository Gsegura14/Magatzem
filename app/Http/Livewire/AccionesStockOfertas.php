<?php

namespace App\Http\Livewire;

use App\Models\StockOferta;
use Illuminate\Http\Request;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OfertaExport;
use App\Imports\RevisionOfertaImport;

class AccionesStockOfertas extends Component
{
    public $modelo = "", $color = "", $talla = "", $valor = 0, $selModo = 0, $ofertaId;

    public function render()
    {
        return view('livewire.acciones-stock-ofertas');
    }

    public function realizarAccion()
    {

        $productos = $this->getProductos();
        if ($productos->isEmpty()) {

        } else {
            if ($this->selModo == 2) {
                $this->cambiarPrecio($productos);
            } elseif ($this->selModo == 1) {
                $this->aplicarDTO($productos);
            } elseif ($this->selModo == 3) {
                $this->aplicarStock($productos);
            } elseif ($this->selModo == 4) {
                $this->aumentarStockPerCent($productos);

            } elseif ($this->selModo == 5) {
                $this->aumentarStockCant($productos);
            }
        }
        $this->emit('actualizar');
        $this->emit('actualizarCabecera',$this->ofertaId);
    }

    protected function cambiarPrecio($productos)
    {
        foreach ($productos as $pr) {

            $pr->update([
                    'precio_oferta' => $this->valor
                ]);
        }
    }

    protected function aplicarDTO($productos)
    {
        foreach ($productos as $pr) {
            $precioActual = $pr->precio_oferta;
            $prOf = $precioActual - ($precioActual * ($this->valor) / 100);
            $pr->update([
                    'precio_oferta' => $prOf
                ]);
        }
    }

    protected function getProductos()
    {

        $prs = StockOferta::select('stock_ofertas.*')
            ->join('productos', 'stock_ofertas.producto_id', '=', 'productos.id')
            ->join('tallas', 'stock_ofertas.talla_id', '=', 'tallas.id')
            ->where('stock_ofertas.oferta_id', '=', $this->ofertaId);

        if ($this->modelo != "") {
            $prs = $prs->where('productos.modelo', '=', $this->modelo);
        }
        if ($this->color != "") {
            $prs = $prs->where('productos.color', '=', strtoupper($this->color));
        }
        if ($this->talla != "") {
            $prs = $prs->where('tallas.talla', '=', $this->talla);
        }

        $prs = $prs->get();


        return $prs;
    }

    protected function aplicarStock($productos)
    {
        foreach($productos as $pr){
            $ped = $this->getPedido($pr);
            $ven = $this->getVendido($pr);
            $val = $this->valor;
            $stock = $this->getStock($ped,$ven,$val);

            $pr->update([
                'stock' => $stock
            ]);
        }
    }

    protected function getPedido(StockOferta $pr){

        $p = $pr->pedido;
        return $p;

    }

    protected function getVendido(StockOferta $pr){

        $v = $pr->vendido;
        return $v;

    }

    protected function getStock($ped,$ven,$val){

        $st = $ped-$ven;
        $stock = ($st*$val/100);
        return $stock;
    }

    protected function aumentarStockPerCent($productos){

        foreach($productos as $pr){
            $cantActual = $pr->stock;
            $val = $this->valor;
            $st = $cantActual+($cantActual*$val/100);
            $pr->update([
                'stock' => $st
            ]);
        }

    }

    protected function aumentarStockCant($productos){
        foreach($productos as $pr){
            $cantActual = $pr->stock;
            $val = $this->valor;
            $st = $cantActual+$val;
            
            $pr->update([
                'stock' => $st
            ]);
        }
       
    }


    public function exportExcel($ofertaId){

        $hora = now();
        $archivo = 'oferta_'.$this->ofertaId.'_'.$hora.'.xlsx';
        return Excel::download(new OfertaExport($ofertaId),$archivo);
    }

    public function frmImportar($ofertaId){
        
        return view('admin.oferta.importStockOferta',compact('ofertaId'));

    }

    public function importar(Request $request,$ofertaId){
        $archivo = $request->file('RevisionOfertaImport');
        Excel::import(new RevisionOfertaImport($ofertaId) ,$archivo);
        return redirect()->route('editar.oferta',$ofertaId);
    }
}
