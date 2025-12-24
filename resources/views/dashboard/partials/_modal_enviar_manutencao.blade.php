<div class="modal-fade" id="enviarManutencaoModal" tabindex="-1" aria-labelledby="enviarManutencaoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="enviarManutencaoModalLabel">Enviar Veículo para Manutenção</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="formEnviarManutencao" method="POST">
                    @csrf
                    @method('PUT')
                    <p>Tem certeza que deseja enviar este veículo para manutenção?</p>
                    <button type="submit" class="btn btn-warning">Sim, enviar para manutenção</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>