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
        
        // Limpeza de Quilometragem
        $kmFormatada = $request->input('quilometragem_atual');
        $kmSemPontuacao = str_replace(['.', ' ', 'km'], '', $kmFormatada);
        $kmSemPontuacao = str_replace(',', '.', $kmSemPontuacao);
        $request->merge(['quilometragem_atual' => $kmSemPontuacao]);

        // Processa valor_dias
        $valorDias = $request->input('valor_dias');
        
        if ($valorDias) {
            $valorLimpo = str_replace(['R$', ' ', 'km', '.'], '', $valorDias);
            $valorLimpo = str_replace(',', '.', $valorLimpo);
            
            if (is_numeric($valorLimpo)) {
                $request->merge(['valor_dias' => (float)$valorLimpo]);
            }
        }

        $dadosValidados = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'placa' => 'required|string|max:10|unique:veiculos,placa',
            'cor' => 'required|string|max:50',
            'quilometragem_atual' => 'required|numeric|min:0',
            'valor_dias' => 'required|numeric|min:0'
        ]);
        
        Veiculo::create($dadosValidados);
        return redirect()->route('home.index')->with('sucesso', 'Veículo cadastrado com sucesso!');
    }

    public function destroy(Veiculo $veiculo){
        $veiculo->delete();
        return redirect()->route('home.index')->with('sucesso', 'Veículo excluído com sucesso!');
    }

    public function update(Veiculo $veiculo, Request $request){
        // Limpeza de Inputs de Quilometragem
        $kmFormatada = $request->input('quilometragem_atual');
        $kmSemPontuacao = str_replace(['.', ','], '', $kmFormatada);
        $request->merge(['quilometragem_atual' => $kmSemPontuacao]);

        // CORREÇÃO PARA valor_dias: Só processa se não for numérico
        $valorDias = $request->input('valor_dias');
        
        if ($valorDias) {
        // Remove R$, espaços e outros caracteres
        $valorLimpo = preg_replace('/[^\d,.]/', '', $valorDias);
        
        // Se tem vírgula, converte para ponto
        if (strpos($valorLimpo, ',') !== false) {
            // Remove pontos de milhar
            $valorLimpo = str_replace('.', '', $valorLimpo);
            // Converte vírgula decimal para ponto
            $valorLimpo = str_replace(',', '.', $valorLimpo);
        }
        
        if (is_numeric($valorLimpo)) {
            $request->merge(['valor_dias' => (float)$valorLimpo]);
        }
    }

        $dadosValidados = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'placa' => ['required','string', 'max:10', Rule::unique('veiculos')->ignore($veiculo->id)],
            'cor' => 'required|string|max:50',
            'quilometragem_atual' => 'required|numeric|min:0',
            'valor_dias' => 'required|numeric|min:0'
        ]);

        $veiculo->update($dadosValidados);
        return redirect()->route('home.index')->with('sucesso', 'Veículo atualizado com sucesso!');
    }

    public function show(Veiculo $veiculo){
        return response()->json($veiculo);
    }

    public function mandarManutencao(Request $request, Veiculo $veiculo){
        $veiculo->status = 'manutencao';
        $veiculo->save();
        return redirect()->route('home.index')->with('sucesso', 'Veículo enviado para manutenção com sucesso!');
    }

}

