<!-- Modal de devolução de veículo -->
<div class="modal fade" id="devolverVeiculoModal" tabindex="-1" aria-labelledby="devolverVeiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalDevolverVeiculo">Devolver Veículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="devolverVeiculoForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="campoQuilometragem" class="form-label">Quilometragem Final</label>
                        <input type="numeric" 
                        class="form-control" 
                        id="campoQuilometragem" 
                        name="campoQuilometragem" 
                        required>
                    </div>
                    <input type="hidden" id="aluguel_id" name="aluguel_id">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Devolver</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>