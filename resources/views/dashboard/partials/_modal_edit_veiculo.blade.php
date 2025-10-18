<div class="modal fade" id="editarVeiculoModal" tabindex="-1" aria-labelledby="editarVeiculoModalLabel" aria-hidden="true">
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
</div>