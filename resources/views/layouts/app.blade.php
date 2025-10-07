<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TorqueSync')</title>

    {{-- O @vite vai carregar o Bootstrap CSS e JS que o Laravel já tem --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light"> {{-- Um fundo cinza claro para não cansar a vista --}}

    {{-- Um container para centralizar e dar um respiro para o conteúdo --}}
    <div class="container mt-5">
        @yield('content') {{-- O conteúdo de cada página será injetado aqui --}}
    </div>

</body>
</html>