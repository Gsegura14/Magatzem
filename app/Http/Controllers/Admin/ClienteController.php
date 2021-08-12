<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
class ClienteController extends Controller
{
    public function index(){
        $clientes = CLiente::all();
        return view('admin.clientes.index',compact('clientes'));
    }
}
