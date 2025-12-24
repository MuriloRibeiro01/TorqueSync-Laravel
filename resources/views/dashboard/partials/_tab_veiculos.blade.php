<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-dark">
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
                <th>Ações</th>
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
                    <td>
                        <button type="button" class="btn btn-sm btn-info text-light"
                                data-bs-toggle="modal"
                                data-bs-target="#editarVeiculoModal"
                                data-update-url="{{ route('veiculos.update', $veiculo->id) }}"
                                data-fetch-url="{{ route('veiculos.show', $veiculo->id) }}"
                                data-veiculo-nome="{{ $veiculo->marca }} {{ $veiculo->modelo }}">
                            Editar
                        </button>

                        <form action="{{ Route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que quer excluir este veículo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger text-light">Excluir</button>
                        </form>
                        @if($veiculo->status === 'Disponível')
                            <button type="button" class="btn btn-sm btn-success text-light btn-alugar-veiculo" 
                            data-veiculo-id="{{ $veiculo->id }}"
                            data-veiculo-nome="{{ $veiculo->marca }} {{ $veiculo->modelo }}"
                            data-bs-toggle="modal"
                            data-bs-target="#alugarVeiculoModal"
                            data-veiculo-diaria="{{ $veiculo->valor_dias }}">
                                Alugar
                            </button>
                        @else
                            <button type="button" class="btn btn-sm btn-success text-light btn-alugar-veiculo" 
                            disabled>
                                Alugar
                            </button>
                        @endif

                        <button type="button" class="btn btn-sm btn-warning text-dark btn-mandar-manutencao"
                        data-veiculo-id="{{ $veiculo->id }}"
                        data-veiculo-nome="{{ $veiculo->marca }} {{ $veiculo->modelo }}"
                        data-bs-toggle="modal"
                        data-bs-target="#enviarManutencaoModal">
                            Manutenção
                        </button>                        
                    </td>

                    
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Nenhum veículo cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#adicionarVeiculoModal">Adicionar Veículo</button>
</div>