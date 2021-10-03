<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cabeceraproveedores as pedidosProveedores;
use App\Models\Cabeceraproveedores;
use Barryvdh\DomPDF\Facade as PDF; 

class CabeceraproveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabeceras = pedidosProveedores::all();
        return view('admin.pedidosProveedores.index',compact('cabeceras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $proveedores = Proveedor::all();
        return view('admin.pedidosProveedores.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(pedidosProveedores $cabecera)
    {
        return view('admin.pedidosProveedores.verPedido',compact('cabecera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pedidosProveedores $cabecera)
    {
        $cabecera->delete();
        return redirect()->route('pedidoProveedor.index');
    }

    public function exportPDF(){

        $pedidos = Cabeceraproveedores::all();
        $pdf = PDF::loadView('admin.pdf.pedidosProveedores',compact('pedidos'));
        return $pdf->download('pedidosProveedores.pdf');
    }
}
