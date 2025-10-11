<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller
{
    public function index(){ 
        $veiculos = Veiculo::all();
        return view('veiculos', ['veiculos' => $veiculos]);
    }

    public function store(Request $request){
        $dadosValidados = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'placa' => 'required|string|max:10|unique:veiculos,placa',
            'cor' => 'required|string|max:50'
        ]);
        Veiculo::create($dadosValidados);
        return redirect()->route('veiculos.index')->with('sucesso', 'Veículo cadastrado com sucesso!');
    }

    
}