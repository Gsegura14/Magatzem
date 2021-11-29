<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CabeceraCampania;
use App\Models\CabeceraCampaniaOferta;
use App\Models\StockCampania;
use App\Models\StockOferta;
use App\Models\Stock;
use Illuminate\Http\Request;


class cabeceraCampaniaController extends Controller
{


    public function index(){
        $campanias = CabeceraCampania::all();
        return view('admin.campanias.index',compact('campanias'));
    }

    public function create(CabeceraCampaniaOferta $ofertaId){

        return view('admin.campanias.create',compact('ofertaId'));
        
    }

    public function procesar(Request $request, CabeceraCampaniaOferta $ofertaId){
    
            $campania = new CabeceraCampania();

            $campania->cliente_id                = $ofertaId->cliente->id;
            $campania->nombre_campania           = $request->nameCampania;
            $campania->fecha_inicio              = $request->fechaInicio;
            $campania->cantidad_unidades         = $request->unidades;
            $campania->cant_modelos              = $request->modelos;
            $campania->cant_refs                 = $request->referencias;
            $campania->duracion                  = $request->duracion;
            $campania->percent_faltas            = $request->faltas;
            $campania->estado                    = 1;

            $campania->save();

            $comprobar = $this->comprobarCabecera($campania->id);
            if($comprobar){
                $campaniaId = $campania->id;
                $idOferta   = $ofertaId->id;
                $this->addStockCampania($campaniaId,$idOferta);
            }

            $regStockOferta = StockOferta::where('oferta_id',$idOferta)->count();
            $regStockCampania = StockCampania::where('campania_id',$campaniaId)->count();

            if($regStockOferta==$regStockCampania){
                $this->eliminarStockOferta($idOferta);
                $this->eliminarCabeceraOferta($idOferta);
                $this->reservarStock($campaniaId);
            }
            
      return redirect()->route('campania.show',$campaniaId);      

            

    }

    public function show(CabeceraCampania $campaniaId){
        return view('admin.campanias.show',compact('campaniaId'));
    }

    protected function comprobarCabecera($id){
        if(CabeceraCampania::find($id)){
            return true;
        }else{
            return false;
        }
    }

    protected function addStockCampania($campaniaId,$idOferta){

        $stocks = StockOferta::where('oferta_id',$idOferta)->get();

        foreach($stocks as $stock){
            $this->agregarRegistro($stock,$campaniaId);
        }


    }

    protected function agregarRegistro($stock,$campaniaId){

        $reg = new StockCampania();
        $reg->campania_id = $campaniaId;
        $reg->producto_id = $stock->producto_id;
        $reg->talla_id = $stock->talla_id;
        $reg->sku = $stock->sku;
        $reg->codigo = $stock->codigo;
        $reg->stock = $stock->stock;
        $reg->precio_oferta = $stock->precio_oferta;
        $reg->save();

    }

    protected function eliminarStockOferta($id){
        $regs = StockOferta::where('oferta_id',$id)->get();
        foreach($regs as $reg){
            $reg->delete();
        }
    }

    protected function eliminarCabeceraOferta($id){
        $reg = CabeceraCampaniaOferta::find($id);
        $reg->delete();
    }

        protected function reservarStock($campaniaId)
        {
           $registrosCampania = StockCampania::where('campania_id',$campaniaId)->get();

           foreach($registrosCampania as $registro){
               $sku = $registro->sku;
                $lineaStock = Stock::where('sku',$sku)->first();
                $reservado = $this->getStockReservado($registro,$lineaStock);
                $disponible = $this->getStockDisponible($reservado,$lineaStock);

                $lineaStock->update([
                    'stock' => $disponible,
                    'reservado' => $reservado
                ]);

           }
        }

        protected function getStockReservado($registro,$lineaStock){
            $r = ($lineaStock->reservado) + ($registro->stock);
                return $r;

        }

        protected function getStockDisponible($reservado, $lineaStock){

            $stockActual = $lineaStock->stock;
            
            $d = $stockActual-$reservado;

            return $d;
        }

}
