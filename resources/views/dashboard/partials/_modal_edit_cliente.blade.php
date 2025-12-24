<div class="modal fade" id="editarClienteModal" tabindex="-1" aria-labelledby="editarClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tituloModalEditCliente">Editar Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="formEditCliente" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="cpfEdit" class="form-label">CPF</label>
                        <input type="text" class="form-control mb-3" id="cpfEdit" name="cpf_documento">
                    </div>
                    <div class="mb-3">
                        <label for="nomeEdit" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nomeEdit" name="nome">
                    </div>
                    <div class="mb-3">
                        <label for="cnhEdit" class="form-label">CNH</label>
                        <input type="number" class="form-control" id="cnhEdit" name="cnh">
                    </div>
                    <div class="mb-3">
                        <label for="emailEdit" class="form-label">E-mail (Opcional)</label>
                        <input type="text" class="form-control" id="emailEdit" name="email" >
                    </div>
                    <div class="mb-3">
                        <label for="telefoneEdit" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefoneEdit" name="telefone">
                    </div>
                    <div class="mb-3">
                        <label for="enderecoEdit" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="enderecoEdit" name="endereco">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>