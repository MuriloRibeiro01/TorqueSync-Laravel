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
                        <label for="cpf_documento" class="form-label">CPF</label>
                        <input type="text" 
                        class="form-control @error('cpf_documento') is-invalid @enderror"
                        id="cpf_documento" 
                        name="cpf_documento" 
                        value="{{ old('cpf_documento') }}"
                        required>
                        @error('cpf_documento')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" 
                        class="form-control mb-3 @error('nome') is-invalid @enderror" 
                        id="nome" 
                        name="nome" 
                        value="{{ old('nome') }}"
                        required>
                        @error('nome')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cnh" class="form-label">CNH</label>
                        <input type="number" 
                        class="form-control @error('cnh') is-invalid @enderror" 
                        id="cnh" 
                        name="cnh" 
                        value="{{ old('cnh') }}"
                        required>
                        @error('cnh')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        name="email" 
                        required>
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" 
                        class="form-control @error('telefone') is-invalid @enderror" 
                        id="telefone"
                        name="telefone"
                        value="{{ old('telefone') }}"
                        required>
                        @error('telefone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" 
                        class="form-control @error('endereco') is-invalid @enderror" 
                        id="endereco" 
                        name="endereco" 
                        value="{{ old('endereco') }}"
                        required>
                        @error('endereco')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>