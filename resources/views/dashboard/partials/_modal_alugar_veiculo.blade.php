<div class="modal fade" id="alugarVeiculoModal" tabindex="-1" aria-labelledby="alugarVeiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ts-modal">
            
            <div class="modal-header border-0">
                <h5 class="modal-title italic fw-bold">
                    <i class="bi bi-key-fill me-2 text-primary"></i>INICIAR LOCAÇÃO
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pt-0">
                <form action="{{ route('aluguel.store') }}" method="POST" id="formAluguel">
                    @csrf
                    {{-- ID do veículo injetado via JS ao abrir o modal --}}
                    <input type="hidden" name="veiculo_id" id="aluguel_veiculo_id" value="">

                    <!-- SESSÃO 01: O Piloto (Cliente) -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        01. SELEÇÃO DO CLIENTE / PILOTO
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-dark border-secondary text-primary">
                                    <i class="bi bi-person-badge"></i>
                                </span>
                                <select class="form-select bg-dark text-light border-secondary @error('cliente_id') is-invalid @enderror" 
                                        name="cliente_id" id="aluguel_cliente_id" required>
                                    <option value="" disabled selected>Selecione um Cliente...</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                            {{ $cliente->nome }} ({{ $cliente->cpf_documento }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('cliente_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- SESSÃO 02: O Cronômetro (Datas) -->
                    <div class="text-secondary small mb-3 italic fw-bold" style="letter-spacing: 1px;">
                        02. PERÍODO DE PISTA (DATAS)
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="data_retirada" class="form-label small">Data de Retirada</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-calendar-event"></i></span>
                                <input type="date" class="form-control @error('data_retirada') is-invalid @enderror" 
                                       id="data_retirada" name="data_retirada" value="{{ old('data_retirada') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="data_devolucao" class="form-label small">Data de Devolução</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-calendar-check"></i></span>
                                <input type="date" class="form-control @error('data_devolucao') is-invalid @enderror" 
                                       id="data_devolucao" name="data_devolucao" value="{{ old('data_devolucao') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- SESSÃO 03: Telemetria Financeira -->
                    <div class="p-4 rounded border border-secondary mb-4" style="background: rgba(255,255,255,0.02);">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <h6 class="text-success italic mb-1">VALOR TOTAL ESTIMADO</h6>
                                <p class="small text-success mb-0">Baseado na diária do veículo selecionado</p>
                            </div>
                            <div class="col-md-5 text-md-end mt-3 mt-md-0">
                                <h2 class="text-success fw-bold mb-0 italic" id="displayValorTotalAluguel" style="text-shadow: 0 0 15px rgba(25, 135, 84, 0.3);">
                                    R$ 0,00
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn-ts btn-ts-primary btn-ts-solid w-100 py-3">
                                <i class="bi bi-check2-square me-2"></i>CONFIRMAR LOCAÇÃO
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>