<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TorqueSync')</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    {{-- O CSS pode ficar aqui no head, vamos separar para garantir --}}
    @vite(['resources/css/app.scss', 'resources/css/theme.scss'])

    <script src="https://unpkg.com/imask"></script>

    
</head>
<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">TorqueSync</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button class="btn btn-sm btn-secondary">Usuário</button>
    </div>
</nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    {{-- O JAVASCRIPT VEM AQUI, NO FINAL! --}}
    @vite(['resources/js/app.js'])

    @stack('scripts')
</body>
</html>