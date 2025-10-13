<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TorqueSync')</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    {{-- O CSS pode ficar aqui no head, vamos separar para garantir --}}
    @vite(['resources/css/app.scss'])

    <div class="container p-0 m-0" style="max-width: 100%;">
        <!-- Barra de navegação -->
        <img src="Logo Torquesync.jpg" class="m-3" id="logoTS" alt="">
    </div>
</head>
<body class="bg-dark">

    <div class="container mt-5">
        @yield('content')
    </div>

    {{-- O JAVASCRIPT VEM AQUI, NO FINAL! --}}
    @vite(['resources/js/app.js'])

    @stack('scripts')
</body>
</html>