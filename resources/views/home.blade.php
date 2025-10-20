@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    {{-- MENSAGEM DE SUCESSO --}}
    @if(session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
        {{-- ... código da mensagem de sucesso ... --}}
    @endif

    {{-- NAVEGAÇÃO EM ABAS --}}
    <ul class="nav nav-tabs mb-3" id="dashboardTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-info" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Visão Geral</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-info" id="veiculos-tab" data-bs-toggle="tab" data-bs-target="#veiculos-tab-pane" type="button" role="tab" aria-controls="veiculos-tab-pane" aria-selected="false">Gerenciar Frota</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-info" id="clientes-tab" data-bs-toggle="tab" data-bs-target="#clientes-tab-pane" type="button" role="tab" aria-controls="clientes-tab-pane" aria-selected="false">Gerenciar Clientes</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-info" id="locacoes-tab" data-bs-toggle="tab" data-bs-target="#locacoes-tab-pane" type="button" role="tab" aria-controls="locacoes-tab-pane" aria-selected="false">Gerenciar Locações</button>
        </li>
    </ul>

    {{-- CONTEÚDO DAS ABAS --}}
    <div class="tab-content" id="dashboardTabsContent">
        {{-- ABA 1: VISÃO GERAL (O dashboard original) --}}
        <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
            @include('dashboard.partials._tab_overview')
        </div>
        

        {{-- ABA 2: GERENCIAR FROTA (CRUD de Veículos) --}}
        <div class="tab-pane fade" id="veiculos-tab-pane" role="tabpanel" aria-labelledby="veiculos-tab" tabindex="0">
            @include('dashboard.partials._tab_veiculos')
        </div>

        {{-- ABA 3: GERENCIAR CLIENTES (CRUD de Clientes) --}}
        <div class="tab-pane fade" id="clientes-tab-pane" role="tabpanel" aria-labelledby="clientes-tab" tabindex="0">
            @include('dashboard.partials._tab_clientes')
        </div>
    </div>
    <!-- MODAL DE FORMULÁRIO DE CADASTRO DOS VEÍCULOS -->

    {{-- MODAIS (ficam fora das abas, pois são globais na página) --}}
    @include('dashboard.partials._modal_add_veiculo')
    @include('dashboard.partials._modal_edit_veiculo')

@endsection