<div class="modal fade" id="editarClienteModal" tabindex="-1" aria-labelledby="editarClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ts-modal">
            
            <div class="modal-header border-0">
                {{-- O JS preenche este título dinamicamente --}}
                <h5 class="modal-title italic fw-bold" id="tituloModalEditCliente">
                    <i class="bi bi-pencil-square me-2 text-info"></i>EDITAR CLIENTE
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pt-0">
                {{-- O JS preenche o 'action' deste form --}}
                <form action="" id="formEditCliente" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- SEÇÃO 01: Identidade -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        01. DADOS DE IDENTIFICAÇÃO
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <label for="nomeEdit" class="form-label small">Nome Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-info"><i class="bi bi-person-vcard"></i></span>
                                <input type="text" class="form-control" id="nomeEdit" name="nome" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="cpfEdit" class="form-label small">CPF</label>
                            <input type="text" class="form-control" id="cpfEdit" name="cpf_documento" required>
                        </div>
                    </div>

                    <!-- SEÇÃO 02: Documentação e Contato -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        02. TELEMETRIA DE CONTATO
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label for="cnhEdit" class="form-label small">CNH (Registro)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-card-checklist"></i></span>
                                <input type="text" class="form-control" id="cnhEdit" name="cnh" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="emailEdit" class="form-label small">E-mail</label>
                            <input type="email" class="form-control" id="emailEdit" name="email" required>
                        </div>

                        <div class="col-md-4">
                            <label for="telefoneEdit" class="form-label small">Telefone</label>
                            <input type="text" class="form-control" id="telefoneEdit" name="telefone" required>
                        </div>
                    </div>

                    <!-- SEÇÃO 03: Endereço -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        03. LOCALIZAÇÃO / BOX
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <label for="enderecoEdit" class="form-label small">Endereço Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" class="form-control" id="enderecoEdit" name="endereco" required>
                            </div>
                        </div>
                    </div>

                    <!-- Botão de Ação -->
                    <div class="row">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn-ts btn-ts-info btn-ts-solid w-100 py-3">
                                <i class="bi bi-arrow-clockwise me-2"></i>ATUALIZAR DADOS
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>