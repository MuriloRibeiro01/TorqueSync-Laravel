<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TorqueSync')</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    

    @vite(['resources/css/app.scss', 'resources/css/fonts.css', 'resources/css/theme.scss'])

    <script src="https://unpkg.com/imask"></script>

    
</head>
<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <!-- 
                A MANHA: Definimos uma altura fixa (height) para a logo. 
                Isso garante que ela caiba na navbar sem quebrar o layout.
                O 'alt' é fundamental para acessibilidade.
            -->
            <img src="{{ asset('images/Logo.png') }}" 
                 alt="TorqueSync Logo" 
                 style="height: 40px; width: auto; object-fit: contain;">
            <span class="ms-2 text-light span-da-logo">TorqueSync</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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