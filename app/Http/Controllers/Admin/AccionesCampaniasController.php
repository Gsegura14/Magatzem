<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CabeceraCampania;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportOrdersCampania;

use App\Models\PedidosCampania;
use App\Models\PoOrders;

class AccionesCampaniasController extends Controller
{
    public function frmimportPed(CabeceraCampania $campaniaId)
    {
        return view('admin.campanias.frmImportPed', compact('campaniaId'));
    }

    public function importar(Request $request, $campaniaId)
    {
        $archivo = $request->file('ImportOrdersCampania');
    
        $PO_order = $this->crearPo($request->PoNumber,$campaniaId);
        $PO_order_id = $PO_order->id;
        $n_orden = $this->getNumeroOrden($campaniaId);
        Excel::import(new ImportOrdersCampania($campaniaId, $PO_order_id, $n_orden), $archivo);
       // config(['Excel.import.startRow' => 24]);
        return redirect()->route('campania.procesar',$campaniaId);
    }
    protected function crearPo($order,$campaniaId)
    {
        $po = new PoOrders();
        $po->po_order = $order;
        $po->campania_id = $campaniaId;

        $po->save();
        return $po;
    }
    protected function getNumeroOrden($id)
    {
        $ultimaOrden = PedidosCampania::orderBy('n_order','desc')
            ->where('campania_id', $id)
            ->first();
        if ($ultimaOrden == null) {

            return 1;
        } else {
            return ($ultimaOrden->n_order) + 1;
        }
    }

    public function procesar($campaniaId)
    {
        return view('admin.campanias.procesar',compact('campaniaId'));
    }

    public function estadisticas($campaniaId)
    {
        return view('admin.campanias.estadisticas',compact('campaniaId'));
    }
}
