<!-- Modal de devolução de veículo -->
<div class="modal fade" id="devolverVeiculoModal" tabindex="-1" aria-labelledby="devolverVeiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="devolverVeiculoModalLabel">Devolver Veículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="devolverVeiculoForm">
                    @csrf
                    <div class="mb-3">
                        <label for="km_final" class="form-label">Quilometragem Final</label>
                        <input type="number" class="form-control" id="km_final" name="km_final" required>
                    </div>
                    <input type="hidden" id="aluguel_id" name="aluguel_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmarDevolucaoBtn">Confirmar Devolução</button>
            </div>
        </div>
    </div>
</div>