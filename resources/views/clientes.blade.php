@extends('layouts.app')

@section('title', 'Listagem de Clientes')

@section('content')

@if(session('sucesso'))
    <div class="alert alert-success">
        {{ session('sucesso') }}
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-light">Listagem de Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="btn btn-outline-info">Adicionar Cliente</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-dark">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        
        </tbody>
    </table>
</div>

@endsection
