{{-- 1. Dizemos qual "planta de casa" usar. Esta deve ser a primeira linha. --}}
@extends('layouts.app')

{{-- 2. (Opcional) Podemos definir o título específico desta página --}}
@section('title', 'Listagem de Veículos')

{{-- 3. Agora, definimos a "mobília" que vai dentro do @yield('content') --}}
@section('content')

    @if(session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Listagem de Veículos</h1>
        <a href="{{ route('veiculos.create') }}" class="btn btn-primary">Adicionar Veículo</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($veiculos as $veiculo)
                    <tr>
                        <td>{{ $veiculo->marca }}</td>
                        <td>{{ $veiculo->modelo }}</td>
                        <td>{{ $veiculo->placa }}</td>
                        <td>{{ $veiculo->ano }}</td>
                        <td>{{ $veiculo->cor }}</td>
                        <td>{{ $veiculo->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhum veículo cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection