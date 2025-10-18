
{{-- Aqui entram os CARDS de KPI --}}
{{-- Aqui entram as listas de "Últimas Locações" e "Devoluções Próximas" --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-light">Dashboard</h1>
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#adicionarVeiculoModal">Adicionar Veículo</button>

        <button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#adicionarClienteModal">Adicionar Cliente</button>

        <button type="button" class="btn btn-outline-secondary mb-2" data-bs-toggle="modal" data-bs-target="#adicionarLocacaoModal">Nova Locação</button>
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