<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Lógica para carregar dados do dashboard
        $veiculosDisponiveis = Veiculo::where('status', 'Disponível')->count();
        $veiculosAlugados = Veiculo::where('status', 'Alugado')->count();
        $veiculosManutencao = Veiculo::where('status', 'Manutenção')->count();

        $clientes = Cliente::all(); // Busca todos os clientes

        // DEIXA VALOR FIXO PARA OS CLIENTES | MUDAR DEPOIS
        $totalClientes = Cliente::count(); // Exemplo fixo

        // Lógica da aba de "GERENCIAR FROTA"
        $veiculos = Veiculo::latest()->get(); // Ordena pelo mais recente

        // Envia dados para a view
        return view('home', compact(
            'veiculosDisponiveis',
            'veiculosAlugados',
            'veiculosManutencao',
            'totalClientes',
            'veiculos',
            'clientes'
        ));
    }
}