<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabeceraproveedores;
use App\Models\lineapedidos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class pedidoProveedorController extends Controller
{
    public function exportPDF(Cabeceraproveedores $cabecera){
        $lineas = lineapedidos::where('pedido_id',$cabecera->id)->get();
        $pdf = PDF::loadView('admin.pdf.pedidoProveedor',compact('cabecera','lineas'));
        return $pdf->download('pedidoProveedor.pdf');
    }
}
