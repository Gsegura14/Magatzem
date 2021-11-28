<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()    {
        return view ('admin.index');
    }

    public function review($d,$f){
        return view('admin.index',compact('d','f'));
    }
}
