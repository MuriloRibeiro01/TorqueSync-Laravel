<div class="modal fade" id="adicionarClienteModal" tabindex="-1" aria-labelledby="adicionarClienteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="marca" class="form-label">Nome</label>
                        <input type="text" class="form-control mb-3" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="modelo" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                    <div class="mb-3">
                        <label for="ano" class="form-label">CNH</label>
                        <input type="number" class="form-control" id="cnh" name="cnh" required>
                    </div>
                    <div class="mb-3">
                        <label for="placa" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>