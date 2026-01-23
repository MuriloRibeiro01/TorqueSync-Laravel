<div class="modal fade modal-adicionar-veiculo" id="adicionarVeiculoModal" tabindex="-1" aria-labelledby="adicionarVeiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- modal-lg para dar espaço ao grid -->
        <div class="modal-content ts-modal"> <!-- ts-modal é sua classe customizada no theme.scss -->
            
            <div class="modal-header border-0">
                <h5 class="modal-title italic fw-bold">
                    <i class="bi bi-plus-circle-fill me-2 text-primary"></i>ADICIONAR VEÍCULO
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pt-0">
                <form action="{{ route('veiculos.store') }}" method="POST">
                    @csrf
                    
                    <!-- SESSÃO 1: Identidade do Carro -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        01. ESPECIFICAÇÕES TÉCNICAS
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-5">
                            <label for="marca" class="form-label small">Marca</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-primary"><i class="bi bi-tag"></i></span>
                                <input type="text" class="form-control" id="marca" name="marca" placeholder="Ex: McLaren" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="modelo" class="form-label small">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ex: MP4/4" required>
                        </div>
                        <div class="col-md-2">
                            <label for="ano" class="form-label small">Ano</label>
                            <input type="number" class="form-control" id="ano" name="ano" placeholder="1988" required>
                        </div>
                    </div>

                    <!-- SESSÃO 2: Dados Legais e Estética -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        02. IDENTIFICAÇÃO E ESTADO
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label for="placa" class="form-label small">Placa</label>
                            <input type="text" class="form-control text-uppercase" id="placa" name="placa" placeholder="ABC-1234" required>
                        </div>
                        <div class="col-md-4">
                            <label for="cor" class="form-label small">Cor</label>
                            <input type="text" class="form-control" id="cor" name="cor" placeholder="Vermelho/Branco" required>
                        </div>
                        <div class="col-md-4">
                            <label for="quilometragem" class="form-label small">Quilometragem</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="quilometragem" name="quilometragem_atual" inputmode="decimal" placeholder="0" required>
                                <span class="input-group-text bg-dark border-secondary text-secondary">KM</span>
                            </div>
                        </div>
                    </div>

                    <!-- SESSÃO 3: Operacional -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        03. COMERCIAL
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="valor_dias" class="form-label small">Valor da Diária (R$)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-warning fw-bold">R$</span>
                                <input type="number" class="form-control form-control-lg border-warning" id="valor_dias" name="valor_dias" step="0.01" placeholder="0,00" required>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">
                                <i class="bi bi-check-lg me-2"></i>CONFIRMAR REGISTRO
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>