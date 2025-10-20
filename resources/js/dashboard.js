// ...código existente...
document.addEventListener('DOMContentLoaded', function () {
    // Controle de rótulos das abas ao passar o mouse / aba ativa
    const tabs = Array.from(document.querySelectorAll('#dashboardTabs .nav-link'));
    if (!tabs.length) return; // sai se não houver abas na página

    tabs.forEach(tab => {
        const original = tab.textContent.trim();
        tab.dataset.original = original;
        tab.dataset.hover = tab.dataset.hover || (original + ' •');
        tab.dataset.active = tab.dataset.active || ('<strong>' + original + ' ✓</strong>');

        tab.addEventListener('mouseenter', () => {
            // ao passar o mouse — mostra o texto de hover
            tab.textContent = tab.dataset.hover;
        });
        tab.addEventListener('mouseleave', () => {
            if (tab.classList.contains('active')) {
                tab.innerHTML = tab.dataset.active;
            } else {
                tab.textContent = tab.dataset.original;
            }
        });
    });

    // Conecta os eventos de abas do Bootstrap (botões que alternam as abas)
    document.querySelectorAll('#dashboardTabs button[data-bs-toggle="tab"]').forEach(btn => {
        btn.addEventListener('shown.bs.tab', (e) => {
            // restaura o texto original de todas as abas
            tabs.forEach(t => t.textContent = t.dataset.original);
            // define o rótulo da aba ativa (permite HTML)
            e.target.innerHTML = e.target.dataset.active;
        });
        btn.addEventListener('hidden.bs.tab', (e) => {
            // ao ser ocultada, restaura o rótulo original
            e.target.textContent = e.target.dataset.original;
        });
    });

    // Garante que a aba inicialmente ativa mostre o rótulo de “ativo”
    const active = document.querySelector('#dashboardTabs .nav-link.active');
    if (active) active.innerHTML = active.dataset.active;


    // Carregador do modal de edição (se necessário)
    const editarVeiculoModal = document.getElementById('editarVeiculoModal');
    const formEditVeiculo = document.getElementById('formEditVeiculo');
    if (editarVeiculoModal && formEditVeiculo) {
        editarVeiculoModal.addEventListener('show.bs.modal', async function (event) {
            const button = event.relatedTarget;
            if (!button) return;
            const fetchUrl = button.getAttribute('data-fetch-url');
            const updateUrl = button.getAttribute('data-update-url');
            if (updateUrl) formEditVeiculo.action = updateUrl;

            if (fetchUrl) {
                try {
                    const resp = await fetch(fetchUrl, { headers: { 'Accept': 'application/json' }});
                    if (!resp.ok) throw new Error('Falha ao buscar dados');
                    const data = await resp.json();
                    document.getElementById('marcaEdit').value = data.marca || '';
                    document.getElementById('modeloEdit').value = data.modelo || '';
                    document.getElementById('anoEdit').value = data.ano || '';
                    document.getElementById('placaEdit').value = data.placa || '';
                    document.getElementById('corEdit').value = data.cor || '';
                    if (document.getElementById('statusEdit')) {
                        document.getElementById('statusEdit').value = data.status || '';
                    }
                } catch (err) {
                    console.error('Erro ao carregar dados do veículo:', err);
                }
            }
        });
    }

    // Botão de alugar muda o status do veículo para "Alugado"
    document.querySelectorAll('.btn-alugar-veiculo').forEach(button => {
        button.addEventListener('click', async function () {
            if (!confirm('Confirmar aluguel deste veículo?')) return;

            const veiculoId = this.getAttribute('data-veiculo-id') || this.dataset.veiculoId;
            const updateUrl = this.getAttribute('data-update-url') || this.dataset.updateUrl;
            if (!veiculoId || !updateUrl) return;

            // get CSRF token from meta tag (ensure <meta name="csrf-token"> exists in your layout)
            const tokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrf = tokenMeta ? tokenMeta.getAttribute('content') : null;

            // optimistic UI: disable button while request runs
            button.disabled = true;
            const originalText = button.innerHTML;
            button.innerHTML = 'Processando...';

            try {
                const resp = await fetch(updateUrl, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        ...(csrf ? { 'X-CSRF-TOKEN': csrf } : {})
                    },
                    body: JSON.stringify({ status: 'Alugado' })
                });

                if (!resp.ok) {
                    // if validation error, try to show message
                    let errMsg = 'Erro ao atualizar veículo.';
                    try {
                        const errJson = await resp.json();
                        if (errJson?.message) errMsg = errJson.message;
                    } catch (_) {}
                    throw new Error(errMsg);
                }

                // success — update the row UI if present
                const row = button.closest('tr');
                if (row) {
                    // prefer an element with class .veiculo-status to update
                    const statusCell = row.querySelector('.veiculo-status');
                    if (statusCell) {
                        statusCell.innerHTML = '<span class="badge bg-warning text-dark">Alugado</span>';
                    } else {
                        const badge = row.querySelector('.badge');
                        if (badge) {
                            badge.textContent = 'Alugado';
                            badge.className = 'badge bg-warning text-dark';
                        }
                    }

                    // optionally disable the rent button to avoid double actions
                    button.disabled = true;
                    button.classList.remove('btn-success');
                    button.classList.add('btn-secondary');
                } else {
                    // fallback: reload the page to reflect changes
                    window.location.reload();
                }
            } catch (err) {
                console.error(err);
                alert(err.message || 'Erro ao alugar veículo.');
                button.disabled = false;
                button.innerHTML = originalText;
            }
        });
    });
});
