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
                        <button type="button" class="btn btn-sm btn-success" id="btn-alugar-veiculo">Alugar</button>
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
</div>