<div class="modal fade" id="adicionarClienteModal" tabindex="-1" aria-labelledby="adicionarClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ts-modal"> <!-- ts-modal é sua classe de vidro no theme.scss -->
            
            <div class="modal-header border-0">
                <h5 class="modal-title italic fw-bold" id="adicionarClienteModalLabel">
                    <i class="bi bi-person-plus-fill me-2 text-primary"></i>NOVO CLIENTE
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pt-0">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    
                    <!-- SEÇÃO 01: Identidade -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        01. IDENTIFICAÇÃO DO PILOTO
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <label for="nome" class="form-label small">Nome Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-primary"><i class="bi bi-person"></i></span>
                                <input type="text" 
                                    class="form-control @error('nome') is-invalid @enderror" 
                                    id="nome" name="nome" value="{{ old('nome') }}" required>
                            </div>
                            @error('nome')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="cpf_documento" class="form-label small">CPF</label>
                            <input type="text" 
                                class="form-control @error('cpf_documento') is-invalid @enderror"
                                id="cpf_documento" name="cpf_documento" value="{{ old('cpf_documento') }}" required>
                            @error('cpf_documento')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- SEÇÃO 02: Habilitação e Contato -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        02. DOCUMENTAÇÃO E CONTATO
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label for="cnh" class="form-label small">CNH (Registro)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-card-list"></i></span>
                                <input type="text" 
                                    class="form-control @error('cnh') is-invalid @enderror" 
                                    id="cnh" name="cnh" value="{{ old('cnh') }}" required>
                            </div>
                            @error('cnh')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="email" class="form-label small">E-mail</label>
                            <input type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="telefone" class="form-label small">Telefone</label>
                            <input type="text" 
                                class="form-control @error('telefone') is-invalid @enderror" 
                                id="telefone" name="telefone" value="{{ old('telefone') }}" required>
                            @error('telefone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- SEÇÃO 03: Endereço -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        03. LOGÍSTICA DE RESIDÊNCIA
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <label for="endereco" class="form-label small">Endereço Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" 
                                    class="form-control @error('endereco') is-invalid @enderror" 
                                    id="endereco" name="endereco" value="{{ old('endereco') }}" required>
                            </div>
                            @error('endereco')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Botão de Ação -->
                    <div class="row">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn-ts btn-ts-primary btn-ts-solid w-100 py-3">
                                <i class="bi bi-person-check me-2"></i>CADASTRAR CLIENTE
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>