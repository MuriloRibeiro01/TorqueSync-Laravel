<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-light">Clientes</h1>
</div>


<div class="table-responsive">
    <table class="table table-dark tabela-clientes">
        <thead class="table-dark">
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>CNH</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->cpf_documento }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cnh }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>
                        <button type="button" class="btn-ts btn-ts-info"
                                data-bs-toggle="modal"
                                data-bs-target="#editarClienteModal"
                                data-update-url="{{ route('clientes.update', $cliente->id) }}"
                                data-fetch-url="{{ route('clientes.show', $cliente->id) }}"
                                data-cliente-nome="{{ $cliente->nome }}">
                            Editar
                        </button>

                        <!-- Tá dando erro de permissão no SQL, ARRUMAR -->
                        <form action="{{ Route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que quer exluir este cliente?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-ts btn-ts-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Nenhum cliente cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <button type="button" class="btn-ts btn-ts-solid btn-ts-primary" data-bs-toggle="modal" data-bs-target="#adicionarClienteModal">Adicionar Cliente</button>

</div>