@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    {{-- MENSAGEM DE SUCESSO --}}
    @if(session('sucesso'))
        {{-- ... código da mensagem de sucesso ... --}}
    @endif

    <h1 class="text-light mb-4">Dados Gerais</h1>

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
            <button class="nav-link text-info" id="locacoes-tab" data-bs-toggle="tab" data-bs-target="#clientes-tab-pane" type="button" role="tab" aria-controls="locacoes-tab-pane" aria-selected="false">Gerenciar Locações</button>
        </li>
        {{-- Você pode adicionar mais abas aqui no futuro (Clientes, Locações, etc) --}}
    </ul>

    {{-- CONTEÚDO DAS ABAS --}}
    <div class="tab-content" id="dashboardTabsContent">
        
        {{-- ABA 1: VISÃO GERAL (O dashboard original) --}}
        <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
            {{-- Aqui entram os CARDS de KPI --}}
            {{-- Aqui entram as listas de "Últimas Locações" e "Devoluções Próximas" --}}
            <p class="text-light">Conteúdo da Visão Geral (cards e listas rápidas) vai aqui.</p>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-light">Dashboard</h1>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-success">
                        <i class="bi bi-plus-circle-fill me-1"></i> Nova Locação
                    </a>

                    <button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#adicionarVeiculoModal">Adicionar Veículo</button>
                    
                    <a href="#" class="btn btn-info text-white">
                        <i class="bi bi-person-plus-fill me-1"></i> Novo Cliente
                    </a>
                </div>
            </div>

            {{-- Cards com Indicadores Chave (KPIs) --}}
            <div class="row mb-4">
                {{-- Card Veículos Disponíveis --}}
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-dark text-light border-success h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs fw-bold text-success text-uppercase mb-1">Veículos Disponíveis</div>
                                    <div class="h2 mb-0 fw-bold">{{ $veiculosDisponiveis }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-key-fill fs-2 text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Veículos Alugados --}}
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-dark text-light border-warning h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs fw-bold text-warning text-uppercase mb-1">Veículos Alugados</div>
                                    <div class="h2 mb-0 fw-bold">{{ $veiculosAlugados }}</div> {{-- DADO DINÂMICO --}}
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-cone-striped fs-2 text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Card Manutenção --}}
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-dark text-light border-danger h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs fw-bold text-danger text-uppercase mb-1">Manutenção Pendente</div>
                                    <div class="h2 mb-0 fw-bold">{{ $veiculosManutencao }}</div> {{-- DADO DINÂMICO --}}
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-tools fs-2 text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Card Total de Clientes --}}
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-dark text-light border-info h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs fw-bold text-info text-uppercase mb-1">Total de Clientes</div>
                                    <div class="h2 mb-0 fw-bold">{{ $totalClientes }}</div> {{-- DADO DINÂMICO --}}
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-people-fill fs-2 text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ABA 2: GERENCIAR FROTA (Seu CRUD de Veículos) --}}
        <div class="tab-pane fade" id="veiculos-tab-pane" role="tabpanel" aria-labelledby="veiculos-tab" tabindex="0">
            {{-- AQUI ENTRA TODO O SEU CÓDIGO DE LISTAGEM DE VEÍCULOS --}}

            <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-dark">
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
                        <td>
                            @if($veiculo->status === 'Disponível')
                                <span class="badge bg-success">{{ $veiculo->status }}</span>
                            @elseif($veiculo->status === 'Alugado')
                                <span class="badge bg-warning text-dark">{{ $veiculo->status }}</span>
                            @elseif($veiculo->status === 'Manutenção')
                                <span class="badge bg-danger">{{ $veiculo->status }}</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editarVeiculoModal"
                                    data-update-url="{{ route('veiculos.update', $veiculo->id) }}"
                                    data-fetch-url="{{ route('veiculos.show', $veiculo->id) }}">
                                Editar
                            </button>

                            <form action="{{ Route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que quer exluir este veículo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhum veículo cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#adicionarVeiculoModal">Adicionar Veículo</button>

    <!-- MODAL DE FORMULÁRIO DE CADASTRO DOS VEÍCULOS -->

        <div class="modal fade " id="adicionarVeiculoModal" tabindex="-1" aria-labelledby="adicionarVeiculoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Veículo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('veiculos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca</label>
                                <input type="text" class="form-control mb-3" id="marca" name="marca" required>
                            </div>
                            <div class="mb-3">
                                <label for="modelo" class="form-label">Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" required>
                            </div>
                            <div class="mb-3">
                                <label for="ano" class="form-label">Ano</label>
                                <input type="number" class="form-control" id="ano" name="ano" required>
                            </div>
                            <div class="mb-3">
                                <label for="placa" class="form-label">Placa</label>
                                <input type="text" class="form-control" id="placa" name="placa" required>
                            </div>
                            <div class="mb-3">
                                <label for="cor" class="form-label">Cor</label>
                                <input type="text" class="form-control" id="cor" name="cor" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarVeiculoModal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloModalEditVeiculo">Editar Veículo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="formEditVeiculo" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="marcaEdit" class="form-label">Marca</label>
                            <input type="text" class="form-control mb-3" id="marcaEdit" name="marca">
                        </div>
                        <div class="mb-3">
                            <label for="modeloEdit" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modeloEdit" name="modelo">
                        </div>
                        <div class="mb-3">
                            <label for="anoEdit" class="form-label">Ano</label>
                            <input type="number" class="form-control" id="anoEdit" name="ano">
                        </div>
                        <div class="mb-3">
                            <label for="placaEdit" class="form-label">Placa</label>
                            <input type="text" class="form-control" id="placaEdit" name="placa" >
                        </div>
                        <div class="mb-3">
                            <label for="corEdit" class="form-label">Cor</label>
                            <input type="text" class="form-control" id="corEdit" name="cor">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>

        </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-light">Veículos Cadastrados</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adicionarVeiculoModal">
                    <i class="bi bi-plus-circle-fill me-1"></i> Adicionar Veículo
                </button>
            </div>
            {{-- A sua tabela de veículos vem aqui... --}}
            {{-- <div class="table-responsive"> ... </div> --}}
        </div>
    </div>

    <style>
        #dashboardTabs .nav-link.active {
            font-weight: 700;
            color: #0066FF;
        }
    </style>

    {{-- MODAIS (ficam fora das abas, pois são globais na página) --}}
    {{-- @include('veiculos.partials.modal_adicionar') --}}
    {{-- @include('veiculos.partials.modal_editar') --}}

@endsection

@push('scripts')
<script>

    document.addEventListener('DOMContentLoaded', function () { // Esse DOM significa que o JS só carrega DEPOIS do HTML
        const tabs = Array.from(document.querySelectorAll('#dashboardTabs .nav-link'));
        if (!tabs.length) return;

        // store original text, optionally you can set data-hover / data-active in HTML
        tabs.forEach(tab => {
            tab.dataset.original = tab.textContent.trim();
            // optional defaults if you don't want to add attributes in HTML
            tab.dataset.hover = tab.dataset.hover || (tab.dataset.original + ' •'); // Quando passa mouse, bolinha
            tab.dataset.active = tab.dataset.active || (tab.dataset.original + ' ✓'); // Quando seleciona, check

            tab.addEventListener('mouseenter', () => {
                // only change text visually on hover
                tab.textContent = tab.dataset.hover;
            });
            tab.addEventListener('mouseleave', () => {
                // restore original, keep active text if it's active
                tab.textContent = tab.classList.contains('active') ? tab.dataset.active : tab.dataset.original;
            });
        });

        // When a tab is shown, restore all and set the active text for the activated tab
        document.querySelectorAll('#dashboardTabs button[data-bs-toggle="tab"]').forEach(btn => {
            btn.addEventListener('shown.bs.tab', (e) => {
                tabs.forEach(t => t.textContent = t.dataset.original); // restore others
                e.target.textContent = e.target.dataset.active; // set active label
            });
            // Optional: when a tab is hidden, restore its original label
            btn.addEventListener('hidden.bs.tab', (e) => {
                e.target.textContent = e.target.dataset.original;
            });
        });

        // If page loads with an already-active tab, ensure it shows the active text
        const active = document.querySelector('#dashboardTabs .nav-link.active');
        if (active) active.textContent = active.dataset.active;
    });

    // JavaScript para carregar dados no modal de edição
    document.addEventListener('DOMContentLoaded', function () {
        var editarVeiculoModal = document.getElementById('editarVeiculoModal');
        var formEditVeiculo = document.getElementById('formEditVeiculo');

        if (editarVeiculoModal) {
            editarVeiculoModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var fetchUrl = button.getAttribute('data-fetch-url');
                var updateUrl = button.getAttribute('data-update-url');

                // Set form action
                formEditVeiculo.action = updateUrl;

                // Fetch vehicle data and fill fields
                fetch(fetchUrl)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('marcaEdit').value = data.marca || '';
                        document.getElementById('modeloEdit').value = data.modelo || '';
                        document.getElementById('anoEdit').value = data.ano || '';
                        document.getElementById('placaEdit').value = data.placa || '';
                        document.getElementById('corEdit').value = data.cor || '';
                        document.getElementById('statusEdit').value = data.status || '';
                    });
            });
        }
    });
</script>
@endpush