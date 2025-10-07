@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos</title>
</head>
<body>
    @if(session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
    @endif

    <button><a href="home">Voltar</a></button>
    <h1>Listagem de Veículos</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Ano</th>
                <th>Cor</th>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            @foreach($veiculos as $veiculo)
                <tr>
                    <td>{{ $veiculo->marca }}</td>
                    <td>{{ $veiculo->modelo }}</td>
                    <td>{{ $veiculo->placa }}</td>
                    <td>{{ $veiculo->ano }}</td>
                    <td>{{ $veiculo->cor }}</td>
                    <td>{{ $veiculo->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button><a href="/veiculos/create">Adicionar Veículos</a></button>
</body>
</html>