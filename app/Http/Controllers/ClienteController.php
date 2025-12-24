<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        return response()->json(Cliente::all());
    }

    public function show(Cliente $cliente)
    {
        return response()->json($cliente);
    }

    public function store(Request $request)
    {

        // Validação básica dos dados
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:255',
            'cpf_documento' => 'required|string|max:14|unique:clientes,cpf_documento',
            'cnh' => 'required|string|max:20|unique:clientes,cnh'
        ]);

        // Cria o CLiente
        $cliente = Cliente::create($dadosValidados);

        if($cliente) {
            return redirect()->route('home.index')->with('sucesso', 'Cliente cadastrado com sucesso!');
        } else {
            return redirect()->route('home.index')->with('erro', 'Erro ao cadastrar cliente. Tente novamente.');
        }
    }

    public function update(Request $request, Cliente $cliente)
    {
        $dadosValidados = request()->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefone' => 'required|string|max:60',
            'endereco' => 'required|string|max:255',
            'cpf_documento' => 'required|string|max:14|unique:clientes,cpf_documento,' . $cliente->id,
            'cnh' => 'required|string|max:20|unique:clientes,cnh,' . $cliente->id
        ]);

        $cliente->update($dadosValidados);
        return redirect()->route('home.index')->with('sucesso', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        // Se o status do cliente for ativo, não permitir exclusão
        if ($cliente->status === 'inativo') {
            $cliente->delete();
            return redirect()->route('home.index')->with('sucesso', 'Cliente excluído com sucesso!');
        } else {
            return redirect()->route('home.index')->with('erro', 'Não é possível excluir um cliente ativo.');
        }
        
    }
}