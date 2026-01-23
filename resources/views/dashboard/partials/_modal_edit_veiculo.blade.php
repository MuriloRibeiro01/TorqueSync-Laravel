<div class="modal fade" id="editarVeiculoModal" tabindex="-1" aria-labelledby="editarVeiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- modal-lg para o grid respirar -->
        <div class="modal-content ts-modal">
            
            <div class="modal-header border-0">
                {{-- O JS preenche este título, mas mantemos o estilo itálico --}}
                <h5 class="modal-title italic fw-bold" id="tituloModalEditVeiculo">
                    <i class="bi bi-pencil-square me-2 text-primary"></i>EDITAR VEÍCULO
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pt-0">
                {{-- O JS preenche o 'action' deste form --}}
                <form action="" id="formEditVeiculo" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- SEÇÃO 01: Especificações -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        01. AJUSTE DE ESPECIFICAÇÕES
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-5">
                            <label for="marcaEdit" class="form-label small">Marca</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-primary"><i class="bi bi-tag"></i></span>
                                <input type="text" class="form-control" id="marcaEdit" name="marca" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="modeloEdit" class="form-label small">Modelo</label>
                            <input type="text" class="form-control" id="modeloEdit" name="modelo" required>
                        </div>
                        <div class="col-md-2">
                            <label for="anoEdit" class="form-label small">Ano</label>
                            <input type="number" class="form-control" id="anoEdit" name="ano" required>
                        </div>
                    </div>

                    <!-- SEÇÃO 02: Identidade -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        02. IDENTIFICAÇÃO E ESTADO ATUAL
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label for="placaEdit" class="form-label small">Placa</label>
                            <input type="text" class="form-control text-uppercase" id="placaEdit" name="placa" required>
                        </div>
                        <div class="col-md-4">
                            <label for="corEdit" class="form-label small">Cor</label>
                            <input type="text" class="form-control" id="corEdit" name="cor" required>
                        </div>
                        <div class="col-md-4">
                            <label for="quilometragemEdit" class="form-label small">Quilometragem</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="quilometragemEdit" name="quilometragem_atual" inputmode="decimal" required>
                                <span class="input-group-text bg-dark border-secondary text-secondary">KM</span>
                            </div>
                        </div>
                    </div>

                    <!-- SEÇÃO 03: Comercial -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        03. CONFIGURAÇÃO COMERCIAL
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="valor_diasEdit" class="form-label small">Valor da Diária (R$)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-warning fw-bold">R$</span>
                                <input type="text" class="form-control form-control-lg border-warning" id="valor_diasEdit" name="valor_dias" placeholder="0,00" required>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="btn-ts btn-ts-primary btn-ts-solid w-100 py-3">
                                <i class="bi bi-arrow-repeat me-2"></i> ATUALIZAR DADOS 
                            </button>
                        </div>
                    </div>

                    <!-- Opcional: Link para manutenção se quiser manter a rima visual -->
                    <!-- <div class="text-center mt-2">
                        <button type="button" class="btn btn-link btn-sm text-warning italic text-decoration-none">
                            <i class="bi bi-tools me-1"></i>Mandar para Manutenção
                        </button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>