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
        $dadosSujos = $request->all();
        
        if(isset($dadosSujos['cpf_documento'])) {
            $dadosSujos['cpf_documento'] = preg_replace('/[^0-9]/', '', $dadosSujos['cpf_documento']);
        }
        
        if(isset($dadosSujos['telefone'])) {
            $dadosSujos['telefone'] = preg_replace('/[^0-9]/', '', $dadosSujos['telefone']);
        }

        if(isset($dadosSujos['cnh'])) {
            $dadosSujos['cnh'] = preg_replace('/[^0-9]/', '', $dadosSujos['cnh']);
        }

        $request->merge($dadosSujos);

        // VALIDAÇÃO
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            // Agora validamos os números limpos
            'telefone' => 'required|string|max:20', 
            'endereco' => 'required|string|max:255',
            'cpf_documento' => 'required|string|unique:clientes,cpf_documento',
            'cnh' => 'required|string|unique:clientes,cnh',
        ]);

        // DEFINIR STATUS
        $dadosValidados['status'] = 'inativo';

        // CRIAÇÃO
        try {
            Cliente::create($dadosValidados);
            return redirect()->route('home.index')->with('sucesso', 'Cliente cadastrado com sucesso!');
        } catch (\Exception $e) {
            // Se der erro de banco (ex: duplicidade que passou na validação), pega aqui
            return redirect()->route('home.index')->with('erro', 'Erro ao salvar no banco: ' . $e->getMessage());
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