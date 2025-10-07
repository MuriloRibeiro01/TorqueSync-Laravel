<?php

namespace App\Http\Controllers;

class ClienteController extends Controller
{
    public function index(){ 
        return view('clientes');
    }

    public function create(){
        return view('clientes.create');
    }
}
