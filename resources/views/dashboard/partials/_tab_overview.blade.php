@php
    use Carbon\Carbon;
@endphp


{{-- Aqui entram os CARDS de KPI --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-light">Visão Geral</h1>
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
                        <div class="h2 mb-0 fw-bold">{{ $veiculosAlugados }}</div>
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
                        <div class="text-xs fw-bold text-danger text-uppercase mb-1">Em Manutenção</div>
                        <div class="h2 mb-0 fw-bold">{{ $veiculosManutencao }}</div>
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
                        <div class="h2 mb-0 fw-bold">{{ $totalClientes }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-people-fill fs-2 text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="text-secondary">

    {{-- Tabela de Veículos em Operação (Alugados / Manutenção) --}}
    <h3 class="text-light mb-3">Veículos em Operação</h3>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-dark tabela-veiculos-em-operacao">
            <thead class="table-dark">
                <tr>
                    <th>Veículo</th>
                    <th>Valor Total</th>
                    <th>Status</th>
                    <th>Quilometragem</th>
                    <th>Locador</th>
                    <th>Data de Devolução</th>
                    <th>Dias Restantes</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($veiculosEmOperacao as $veiculo)
                    <tr>
                        <td>{{ $veiculo->marca }} {{ $veiculo->modelo }} ({{ $veiculo->placa }})</td>
                        <td>
                            @if($veiculo->status === 'Alugado' && $veiculo->aluguelAtivo)
                                R$ {{ number_format($veiculo->aluguelAtivo->valor_aluguel, 2, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($veiculo->status === 'Alugado')
                                <span class="badge bg-warning text-dark">{{ $veiculo->status }}</span>
                            @elseif($veiculo->status === 'Manutenção')
                                <span class="badge bg-danger">{{ $veiculo->status }}</span>
                            @endif
                        </td>
                        <td>{{ number_format($veiculo->quilometragem_atual, 0, ',', '.') }} km</td>
                        <td>
                            @if($veiculo->status === 'Alugado' && $veiculo->aluguelAtivo && $veiculo->aluguelAtivo->cliente)
                                {{ $veiculo->aluguelAtivo->cliente->nome }}
                            @elseif($veiculo->status === 'Manutenção')
                                Em manutenção
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($veiculo->status === 'Alugado' && $veiculo->aluguelAtivo && $veiculo->aluguelAtivo->data_devolucao)
                                {{-- Graças ao $casts, $veiculo->aluguelAtivo->data_devolucao JÁ É um objeto Carbon --}}
                                {{ $veiculo->aluguelAtivo->data_devolucao->format('d/m/Y') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($veiculo->status === 'Alugado' && $veiculo->aluguelAtivo && $veiculo->aluguelAtivo->data_devolucao)
                                @php
                                    // usa copy() para NÃO mutar o Carbon do model
                                    $dataDevolucao = $veiculo->aluguelAtivo->data_devolucao->copy()->startOfDay();
                                    $hoje = \Carbon\Carbon::today();

                                    // dias de diferença (sempre positivo)
                                    $dias = $hoje->diffInDays($dataDevolucao);
                                @endphp

                                @if($dataDevolucao->isFuture())
                                    <span class="text-success">Faltam {{ $dias }} dia{{ $dias > 1 ? 's' : '' }}</span>
                                @elseif($dataDevolucao->isToday())
                                    <span class="text-warning fw-bold">Termina hoje</span>
                                @else
                                    <span class="text-danger fw-bold">Atrasado {{ $dias }} dia{{ $dias > 1 ? 's' : '' }}!</span>
                                @endif
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            @if($veiculo->status === 'Alugado' && $veiculo->aluguelAtivo)
                                <button 
                                    type="button" 
                                    class="btn-ts btn-ts-success btn-devolver-veiculo"
                                    data-bs-toggle="modal"
                                    data-bs-target="#devolverVeiculoModal"
                                    data-devolver-url="{{ route('aluguel.devolver', $veiculo->aluguelAtivo->id) }}"
                                    data-km-atual="{{ $veiculo->quilometragem_atual }}"
                                    data-veiculo-nome="{{ $veiculo->marca }} {{ $veiculo->modelo }}"
                                    data-fetch-url="{{ route('aluguel.show', $veiculo->aluguelAtivo->id) }}"
                                    >
                                    Devolução
                                </button>
                            @else
                                -
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        {{-- Corrigindo o colspan para 8 colunas --}}
                        <td colspan="8" class="text-center">Nenhum veículo em operação (alugado ou em manutenção).</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div id="mensagemRetorno" class="mt-3">
            {{-- Mensagem de retorno após ação será inserida aqui via JavaScript --}}
            
        </div>
    </div>
</div>