<div class="modal fade" id="alugarVeiculoModal" tabindex="-1" aria-labelledby="alugarVeiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alugar Veículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('aluguel.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="veiculo_id" id="aluguel_veiculo_id" value="">

                    {{-- Cliente --}}
                    <div class="mb-3">
                        <label for="aluguel_cliente_id" class="form-label">Selecione o Cliente</label>
                        {{-- Carrega os clientes --}}
                        <select class="form-select @error('cliente_id') is-invalid @enderror" 
                        name="cliente_id" 
                        id="aluguel_cliente_id" 
                        required>
                            <option value="">Selecione um Cliente...</option>
                            @foreach($clientes as $cliente) {{-- O DashboardController busca $clientes --}}
                                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}{{ $cliente->nome }}>
                                    {{ $cliente->nome }} (CPF: {{ $cliente->cpf_documento }})
                                </option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Datas --}}
                    <div class="mb-3">
                        <label for="data_retirada" class="form-label">Data de Retirada</label>
                        <input type="date" 
                        class="form-control @error('data_retirada') is-invalid @enderror" 
                        id="data_retirada" 
                        name="data_retirada"
                        value="{{ old('data_retirada') }}"
                        required>
                        @error('data_retirada')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="data_devolucao" class="form-label">Data de Devolução</label>
                        <input type="date" 
                        class="form-control @error('data_devolucao') is-invalid @enderror" 
                        id="data_devolucao" 
                        name="data_devolucao"
                        value="{{ old('data_devolucao') }}"
                        required>
                    </div>

                    {{-- Valor do Aluguel --}}
                    <div class="mb-3">
                        <h5 class="text-light">Valor Total Previsto:</h5>                        
                        <h2 class="text-success fw-bold" id="displayValorTotalAluguel">R$ 0,00</h2>
                    </div>


                    {{-- Campos futuros (Data de Retirada, Data de Devolução, etc) --}}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Alugar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>