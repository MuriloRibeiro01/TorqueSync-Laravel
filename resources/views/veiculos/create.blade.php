<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Veículos</title>
</head>
<body>
    <h1>Adicionar Novo Veículo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops! Algo deu errado:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('veiculos.store') }}" method="POST">
        @csrf <!-- segurança contra ataques -->
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br><br>

        <label for="ano">Ano:</label>
        <input type="number" id="ano" name="ano" required><br><br>

        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" required><br><br>

        <label for="cor">Cor:</label>
        <input type="text" id="cor" name="cor" required><br><br>

        <button class="btn btn-primary btn-lg" type="submit">Salvar</button>
    </form>
</body>
</html>