<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabeceraproveedores;
use Illuminate\Http\Request;
use App\Models\EntradaMercancia;
use App\Models\Proveedor;

class EntradamercanciasController extends Controller
{
   
    public function frmEntrada(){
        
        return view('admin.entradas.frm');
        
    }
}
