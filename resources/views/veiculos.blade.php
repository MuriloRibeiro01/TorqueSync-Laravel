{{-- 1. Dizemos qual "planta de casa" usar. Esta deve ser a primeira linha. --}}
@extends('layouts.app')

{{-- 2. (Opcional) Podemos definir o título específico desta página --}}
@section('title', 'Listagem de Veículos')

{{-- 3. Agora, definimos a "mobília" que vai dentro do @yield('content') --}}
@section('content')

    @if(session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-light">Veículos</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-dark">
            <thead class="table-dark">
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($veiculos as $veiculo)
                    <tr>
                        <td>{{ $veiculo->marca }}</td>
                        <td>{{ $veiculo->modelo }}</td>
                        <td>{{ $veiculo->placa }}</td>
                        <td>{{ $veiculo->ano }}</td>
                        <td>{{ $veiculo->cor }}</td>
                        <td>{{ $veiculo->status }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editarVeiculoModal"
                                    data-update-url="{{ route('veiculos.update', $veiculo->id) }}"
                                    data-fetch-url="{{ route('veiculos.show', $veiculo->id) }}">
                                Editar
                            </button>

                            <form action="{{ Route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que quer exluir este veículo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhum veículo cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <button type="button" class="btn btn-outline-info mb-2" data-bs-toggle="modal" data-bs-target="#adicionarVeiculoModal">Adicionar Veículo</button>

        <!-- MODAL DE FORMULÁRIO DE CADASTRO DOS VEÍCULOS -->

        <div class="modal fade " id="adicionarVeiculoModal" tabindex="-1" aria-labelledby="adicionarVeiculoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Veículo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('veiculos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca</label>
                                <input type="text" class="form-control mb-3" id="marca" name="marca" required>
                            </div>
                            <div class="mb-3">
                                <label for="modelo" class="form-label">Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" required>
                            </div>
                            <div class="mb-3">
                                <label for="ano" class="form-label">Ano</label>
                                <input type="number" class="form-control" id="ano" name="ano" required>
                            </div>
                            <div class="mb-3">
                                <label for="placa" class="form-label">Placa</label>
                                <input type="text" class="form-control" id="placa" name="placa" required>
                            </div>
                            <div class="mb-3">
                                <label for="cor" class="form-label">Cor</label>
                                <input type="text" class="form-control" id="cor" name="cor" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarVeiculoModal" data-bs-backdrop="static">
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

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var editarVeiculoModal = document.getElementById('editarVeiculoModal');
    var formEditVeiculo = document.getElementById('formEditVeiculo');

    if (editarVeiculoModal) {
        editarVeiculoModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var fetchUrl = button.getAttribute('data-fetch-url');
            var updateUrl = button.getAttribute('data-update-url');

            // Set form action
            formEditVeiculo.action = updateUrl;

            // Fetch vehicle data and fill fields
            fetch(fetchUrl)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('marcaEdit').value = data.marca || '';
                    document.getElementById('modeloEdit').value = data.modelo || '';
                    document.getElementById('anoEdit').value = data.ano || '';
                    document.getElementById('placaEdit').value = data.placa || '';
                    document.getElementById('corEdit').value = data.cor || '';
                    document.getElementById('statusEdit').value = data.status || '';
                });
        });
    }
});
</script>

    

