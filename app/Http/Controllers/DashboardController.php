<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Aluguel;
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
        
        $totalClientes = Cliente::count(); // Conta o total de clientes

        // Lógica da aba de "GERENCIAR FROTA"
        $veiculos = Veiculo::latest()->get(); // Ordena pelo mais recente

        $quilometragem = Veiculo::select('id', 'quilometragem_atual')->get();

        $veiculosEmOperacao = Veiculo::with(['aluguelAtivo.cliente'])
            ->whereIn('status', ['Alugado', 'Manutenção'])
            ->get();


        // Envia dados para a view
        return view('home', compact(
            'veiculosDisponiveis',
            'veiculosAlugados',
            'veiculosManutencao',
            'totalClientes',
            'veiculos',
            'clientes',
            'quilometragem',
            'veiculosEmOperacao'
        ));

       
    }
}