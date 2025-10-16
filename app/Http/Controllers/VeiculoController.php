<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;
use Illuminate\Validation\Rule;

class VeiculoController extends Controller
{



    public function index(){ 
        $veiculos = Veiculo::all();
        return view('home', ['veiculos' => $veiculos]);
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
        return redirect()->route('home.index')->with('sucesso', 'Veículo cadastrado com sucesso!');
    }

    public function destroy(Veiculo $veiculo){
        $veiculo->delete();
        return redirect()->route('home.index')->with('sucesso', 'Veículo excluído com sucesso!');
    }

    public function update(Veiculo $veiculo, Request $request){
        $dadosValidados = request()->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'placa' => ['required','string', 'max:10', Rule::unique('veiculos')->ignore($veiculo->id)],
            'cor' => 'required|string|max:50'
        ]);

        $veiculo->update($dadosValidados);
        return redirect()->route('home.index')->with('sucesso', 'Veículo atualizado com sucesso!');
    }

    public function show(Veiculo $veiculo){
        return response()->json($veiculo);
    }

    
}