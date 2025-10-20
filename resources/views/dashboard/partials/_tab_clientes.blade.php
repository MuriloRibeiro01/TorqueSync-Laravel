<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-dark">
        <thead class="table-dark">
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>CNH</th>
                <th>Endereço</th>
                <th>Celular</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cnh }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->celular }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info"
                                data-bs-toggle="modal"
                                data-bs-target="#editarClienteModal"
                                data-update-url="{{ route('clientes.update', $cliente->id) }}"
                                data-fetch-url="{{ route('clientes.show', $cliente->id) }}">
                            Editar
                        </button>

                        <form action="{{ Route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que quer exluir este cliente?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhum cliente cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#adicionarClienteModal">Adicionar Cliente</button>

</div>