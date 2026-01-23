<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-light">Veículos</h1>
</div>

<div class="table-responsive">
    <table class="table table-dark tabela-veiculos">
        <thead class="table-dark">
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Ano</th>
                <th>Cor</th>
                <th>Quilometragem</th>
                <th>Status</th>
                <th>Valor por Dia</th>
                <th class="text-end" style="width: 1%; white-space: nowrap;"></th>
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
                    <td>{{ number_format($veiculo->quilometragem_atual, 0, ',', '.') }} km</td>
                    <td>
                        @if($veiculo->status === 'Disponível')
                            <span class="badge bg-success">{{ $veiculo->status }}</span>
                        @elseif($veiculo->status === 'Alugado')
                            <span class="badge bg-warning text-dark">{{ $veiculo->status }}</span>
                        @elseif($veiculo->status === 'Manutenção')
                            <span class="badge bg-danger">{{ $veiculo->status }}</span>
                        @endif
                    </td>
                    <td>R$ {{ number_format($veiculo->valor_dias, 2, ',', '.') }}</td>
                    <td class="text-nowrap">
                        @if($veiculo->status === 'Disponível')
                            <button type="button" class="btn-ts btn-ts-primary" 
                            data-veiculo-id="{{ $veiculo->id }}"
                            data-veiculo-nome="{{ $veiculo->marca }} {{ $veiculo->modelo }}"
                            data-bs-toggle="modal"
                            data-bs-target="#alugarVeiculoModal"
                            data-veiculo-diaria="{{ $veiculo->valor_dias }}">
                                Alugar
                            </button>
                        @else
                            <button type="button" class="btn-ts btn-ts-primary-disabled" disabled>
                                Alugar
                            </button>
                        @endif
                        
                        <button type="button" class="btn-ts btn-ts-info"
                                data-bs-toggle="modal"
                                data-bs-target="#editarVeiculoModal"
                                data-update-url="{{ route('veiculos.update', $veiculo->id) }}"
                                data-fetch-url="{{ route('veiculos.show', $veiculo->id) }}"
                                data-veiculo-nome="{{ $veiculo->marca }} {{ $veiculo->modelo }}">
                            Editar
                        </button>                        

                        <button type="button" class="btn-ts btn-ts-info"
                        data-veiculo-id="{{ $veiculo->id }}"
                        data-veiculo-nome="{{ $veiculo->marca }} {{ $veiculo->modelo }}"
                        data-bs-toggle="modal"
                        data-bs-target="#enviarManutencaoModal">
                            Manutenção
                        </button>

                        <form action="{{ Route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que quer excluir este veículo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-ts btn-ts-danger">Excluir</button>
                        </form>
                    </td>

                    
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Nenhum veículo cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <button type="button" class="btn-ts btn-ts-solid btn-ts-primary" data-bs-toggle="modal" data-bs-target="#adicionarVeiculoModal">Adicionar Veículo</button>
</div>