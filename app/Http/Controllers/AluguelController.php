<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Aluguel;
use Carbon\Carbon;
use SebastianBergmann\Environment\Console;

class AluguelController extends Controller
{
    public function store (Request $request) {
        // Valida os dados
        $dadosValidados = $request->validate([
            'veiculo_id' => 'required|exists:veiculos,id',
            'cliente_id' => 'required|exists:clientes,id',
            'data_retirada' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_retirada',            
        ]);

        // Encontra o veículo a ser alugado
        $veiculo = Veiculo::find($dadosValidados['veiculo_id']);

        // Encontra o cliente que está alugando
        $cliente = Cliente::find($dadosValidados['cliente_id']);

        // Se não achar o veículo
        if(!$veiculo) {
            return redirect()->route('home.index')->with('erro', 'Veículo não encontrado!');
        }

        // Lógica de cálculo do valor do aluguel
        $dataRetirada = Carbon::parse($dadosValidados['data_retirada']);
        $dataDevolucao = Carbon::parse($dadosValidados['data_devolucao']);

        // Adiciona 1 dia se for o mesmo dia
        $diasAluguel = $dataRetirada->diffInDays($dataDevolucao) + 1;

        // Pega o valor da diária do veículo
        $valorDiaria = $veiculo->valor_dias;

        // Calcula o valor total do aluguel
        $dadosValidados['valor_aluguel'] = $diasAluguel * $valorDiaria;

        // Adiciona a quilometragem de retirada
        $dadosValidados['quilometragem_retirada'] = $veiculo->quilometragem_atual;

        // Cria o alugel
        $aluguel = Aluguel::create($dadosValidados);

        // Atualiza o status do veículo para alugado
        $veiculo->status = 'Alugado';
        $veiculo->save();

        // Atualiza o status do cliente para ativo
        $cliente->status = 'ativo';
        $cliente->save();

        return redirect()->route('home.index')->with('sucesso', 'Veículo alugado com sucesso! Valor total: R$ ' . number_format($dadosValidados['valor_aluguel'], 2, ',', '.'));
    }

    public function devolverLocacao(Aluguel $aluguel, Request $request)
    {

        // Pega o Veículo que está "amarrado" a este aluguel
        $veiculo = $aluguel->veiculo; 

        if(!$veiculo) {
            // Se não achar o veículo, retorna um erro JSON
            return response()->json(['message' => 'Veículo não encontrado!'], 404);
        }

        $request->validate(['campoQuilometragem' => 'required|numeric|min:0']);

        $kmAtualizada = [
            'quilometragem_atual' => $request->input('campoQuilometragem')
        ];

        $veiculo->status = 'Disponível';
        $veiculo->save();

        // Atualiza o status do CLIENTE se ele não tiver mais alugueis ativos
        $cliente = $aluguel->cliente;
        if ($cliente) {
            $alugueisAtivos = $cliente->alugueis()->whereNull('data_devolucao')->count();
            if ($alugueisAtivos <= 1) { // Se for 1 ou menos, significa que este é o último aluguel ativo
                $cliente->status = 'inativo';
                $cliente->save();
            }
        }       

        $aluguel->data_devolucao = Carbon::now();
        
        $aluguel->save();
        
        $veiculo->update($kmAtualizada);

        return redirect()->route('home.index')->with('sucesso', 'Veículo devolvido com sucesso!');
    }
}