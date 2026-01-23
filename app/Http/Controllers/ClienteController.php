<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Validation\Rule;

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
        // 1. LIMPEZA (Sanitização)
        // Vamos limpar direto no request para facilitar
        $input = $request->all();
        
        // Remove tudo que não é número desses campos, se eles existirem
        foreach (['cpf_documento', 'telefone', 'cnh'] as $campo) {
            if (!empty($input[$campo])) {
                $input[$campo] = preg_replace('/[^0-9]/', '', $input[$campo]);
            }
        }

        // Injeta os dados limpos de volta na requisição
        $request->merge($input);

        // 2. VALIDAÇÃO (O Segurança)
        // Se falhar aqui, ele volta pra view automaticamente
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string|max:20', 
            'endereco' => 'required|string|max:255',
            // Valida se é único na tabela clientes
            'cpf_documento' => 'required|string|unique:clientes,cpf_documento',
            'cnh' => 'required|string|unique:clientes,cnh',
        ]);

        // 3. DEFINIR STATUS (Valor padrão)
        $dadosValidados['status'] = 'inativo'; // Começa inativo até alugar

        // 4. CRIAÇÃO
        try {
            Cliente::create($dadosValidados);
            return redirect()->route('home.index')->with('sucesso', 'Cliente cadastrado com sucesso!');
        } catch (\Exception $e) {
            // Captura erro de banco (ex: duplicidade que passou, erro de conexão)
            return redirect()->route('home.index')
                ->with('erro', 'Erro ao criar cliente: ' . $e->getMessage())
                ->withInput(); // Devolve os dados para o usuário não digitar tudo de novo
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
        if ($cliente->status == 'inativo' || $cliente->status == NULL) {
            $cliente->delete();
            return redirect()->route('home.index')->with('sucesso', 'Cliente excluído com sucesso!');
        } else {
            return redirect()->route('home.index')->with('erro', 'Não é possível excluir um cliente ativo.');
        }
        
    }
}